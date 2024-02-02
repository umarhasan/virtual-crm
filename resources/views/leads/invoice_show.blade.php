@extends('layouts.app')


@section('content')
<style>
    .content-header h1 {
      color: #007bff;
    }

    .breadcrumb {
      background-color: #e9ecef;
      padding: 8px;
      border-radius: 4px;
    }

    
    .card {
      background-color: #fff;
      border: 1px solid #dee2e6;
      border-radius: 4px;
      margin-top: 20px;
    }

    
    header {
      background-color: #007bff;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    header img {
      max-width: 100px;
      margin-top: 10px;
    }

    article, aside {
      padding: 20px;
    }

    .meta, .inventory, .balance {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    .meta th, .meta td, .inventory th, .inventory td, .balance th, .balance td {
      border: 1px solid #dee2e6;
      padding: 8px;
      text-align: left;
    }

    .meta th, .inventory th, .balance th {
      background-color: #f8f9fa;
    }
    .cut, .add {
      background-color: #007bff;
      color: #fff;
      padding: 5px 10px;
      text-decoration: none;
      cursor: pointer;
      margin-left: 5px;
      border-radius: 4px;
    }
    .address {
      display: inline-block;
      vertical-align: top; /* Align the address to the top of the line */
    }

    .meta {
      display: inline-block;
      vertical-align: top; /* Align the table with the address */
      margin-left: 148px; /* Add some space between the address and the table */
    }
    aside {
      margin-top: 20px;
      background-color: #f8f9fa;
      padding: 20px;
    }

    aside h1 {
      color: #007bff;
    }

    .comment-section {
        position: relative;
    }

    .toggle-comment-btn {
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        text-decoration: none;
        cursor: pointer;
        margin-left: 5px;
        border-radius: 4px;
        border: none;
    }

    .comment-field {
        margin-top: 10px;
        text-align: justify;
    }
  </style>
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h3></h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Leads Invoice</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card">
                <form method="post" action="{{ route('leads.mark.convert') }}">
                @csrf
                  <article>
                      <p style="text-align:center;background:#000;font-size:20px;color:#fff">Invoice</p> 
                      <input type="hidden" name="invoice_id" value="{{ date('YmdHis') . '-' . rand(1000, 9999) }}">
                      <address contenteditable>
                        <p>Name:&nbsp;<strong>{{ auth()->check() ? auth()->user()->name : '' }}</strong></p>
                        <p>Address:&nbsp;<strong>{{ auth()->check() ? auth()->user()->address : '' }}</strong></p>
                        <p>Phone:&nbsp;<strong>{{ auth()->check() ? auth()->user()->phone : '' }}</strong></p>
                        <p>Leads:&nbsp;<strong>{{ $invoice ? $invoice->leads->name : '' }}</strong></p>
                      </address>
                    
                      <div class="row">
                        <div class="col-md-6" style="margin-top: 46px;">
                            <div class="comment-section">
                                <div class="comment-field" contenteditable>
                                    <input type="text" name="comment" class="form-control" style="display: none;"></input>
                                    <input type="hidden" name="lead_id" class="form-control" value="{{ $invoice->lead_id }}"></input>
                                  </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <table class="meta">
                            <tr>
                              <th><span contenteditable>Invoice #</span></th>
                              <td><span contenteditable>{{ date('YmdHis') . '-' . rand(1000, 9999) }}</span></td>
                            </tr>
                            <tr>
                              <th><span contenteditable>Date</span></th>
                              <td><span contenteditable>{{ now()->format('F j, Y') }}</span></td>
                            </tr>
                            <tr>
                              <th><span contenteditable>Amount Due</span></th>
                              <td><span id="prefix" contenteditable>$</span><span id="amount-due">0.00</span></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <table class="inventory" id="invoice-items">
                        <thead>
                          <tr>
                            <th><span contenteditable>Item</span></th>
                            <th><span contenteditable>Description</span></th>
                            <th><span contenteditable>Rate</span></th>
                            <th><span contenteditable>Quantity</span></th>
                            <th><span contenteditable>Total Price</span></th>
                            <th><span contenteditable></span></th>  
                          </tr>
                        </thead>
                        <tbody>
                          <tr id="append-row">
                            <td>
                              <select name="product[]" class="form-control" >
                                @foreach ($products as $pro)
                                <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                @endforeach
                              </select>
                            </td>
                            <td><input name="description[]" class="form-control" ></input></td>
                            <td><input name="amount[]" class="form-control"></input></td>
                            <td><input name="qty[]" class="form-control"></input></td>
                            <td><input name="total_amount[]" class="form-control" readonly></input></td>
                            <td><a class="cut">-</a></td>
                          </tr>
                        </tbody>
                      </table>

                      <br/>
                      <a class="add" id="add-item">+</a>
                    
                      <table class="balance">
                        <tr>
                          <th><span contenteditable>Total</span></th>
                          <td><span id="overall-total">0.00</span></td>
                        </tr>
                        <tr>
                          <th><span contenteditable>Amount Paid</span></th>
                          <td><input name="amount_paid" id="amount_paid" class="form-control"></input></td>
                        </tr>
                        <tr>
                          <th><span contenteditable>Balance Due</span></th>
                          <td><span id="balance-due">0.00</span></td>
                        </tr>
                      </table>
                  
                  </article>
                  
                  <aside>
                    <h1><span contenteditable>Additional Notes</span></h1>
                    <div contenteditable>
                      <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
                    </div>
                  </aside>

                  <button type="submit" class="btn btn-primary">Mark Convert</button>
                </form>  
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
  </div>
</div>

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  
  <script>
    $(document).ready(function () {
      const invoiceItems = $('#invoice-items tbody');
      const amountPaidInput = $('#amount_paid');
      const balanceDueSpan = $('#balance-due');
      const amountDueSpan = $('#amount-due');
      const prefixSpan = $('#prefix');

      // Set initial values
      amountDueSpan.text('0.00');

      function updateTotal() {
        let total = 0;

        invoiceItems.find('tr').each(function () {
          const price = parseFloat($(this).find('[name="amount[]"]').val()) || 0;
          const quantity = parseInt($(this).find('[name="qty[]"]').val()) || 0;

          const totalAmount = price * quantity;
          $(this).find('[name="total_amount[]"]').val(totalAmount.toFixed(2));

          total += totalAmount;
        });

        $('.balance td:last-child span').text(total.toFixed(2));
        updateBalance();
      }

      function updateBalance() {
        const total = parseFloat($('.balance td:last-child span').text()) || 0;
        const amountPaid = parseFloat(amountPaidInput.val()) || 0;

        const balanceDue = total - amountPaid;
        balanceDueSpan.text(balanceDue.toFixed(2));
        amountDueSpan.text(balanceDue.toFixed(2));
        prefixSpan.text('$'); // Set or update the prefix
      }

      $('#add-item').on('click', function () {
        const newRow = `<tr><td><select name="product[]" class="form-control">@foreach ($products as $pro)<option value="{{ $pro->id }}">{{ $pro->name }}</option>@endforeach</select></td><td><input name="description[]" class="form-control"></td><td><input name="amount[]" class="form-control"></td><td><input name="qty[]" class="form-control"></td><td><input name="total_amount[]" class="form-control" readonly></td><td><a class="cut">-</a></td></tr>`;

        invoiceItems.append(newRow);
        updateTotal();
      });

      invoiceItems.on('click', '.cut', function () {
        $(this).closest('tr').remove();
        updateTotal();
      });

      invoiceItems.on('input', 'input[name="amount[]"], input[name="qty[]"]', updateTotal);
      amountPaidInput.on('input', updateBalance);
    });

  
        $('.toggle-comment-btn').on('click', function () {
            $('.comment-field').toggle();
        });
   
  </script>

@endsection
 