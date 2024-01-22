@extends('layouts.app')


@section('content')
<style>


  /* Style the content header */
  .content-header h1 {
    color: #007bff;
  }

  /* Style the breadcrumb */
  .breadcrumb {
    background-color: #e9ecef;
    padding: 8px;
    border-radius: 4px;
  }

  /* Style the card */
  .card {
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: 4px;
    margin-top: 20px;
  }

  /* Style the header section */
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

  /* Style the article section */
  article, aside {
    padding: 20px;
  }

  /* Style the invoice details table */
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

  /* Style the cut and add buttons */
  .cut, .add {
    background-color: #007bff;
    color: #fff;
    padding: 5px 10px;
    text-decoration: none;
    cursor: pointer;
    margin-left: 5px;
    border-radius: 4px;
  }

  /* Style the additional notes section */
  aside {
    margin-top: 20px;
    background-color: #f8f9fa;
    padding: 20px;
  }

  aside h1 {
    color: #007bff;
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
                <h3>Leads Invoice</h3>
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
              
              <article>
                <h1>Recipient</h1>
                <address contenteditable>
                  <p>Some Company<br>c/o Some Guy</p>
                </address>
                <table class="meta">
                  <tr>
                    <th><span contenteditable>Invoice #</span></th>
                    <td><span contenteditable>101138</span></td>
                  </tr>
                  <tr>
                    <th><span contenteditable>Date</span></th>
                    <td><span contenteditable>January 1, 2012</span></td>
                  </tr>
                  <tr>
                    <th><span contenteditable>Amount Due</span></th>
                    <td><span id="prefix" contenteditable>$</span><span>600.00</span></td>
                  </tr>
                </table>
                <table class="inventory" id="invoice-items">
                      <thead>
                        <tr>
                          <th><span contenteditable>Item</span></th>
                          <th><span contenteditable>Description</span></th>
                          <th><span contenteditable>Rate</span></th>
                          <th><span contenteditable>Quantity</span></th>
                          <th><span contenteditable>Price</span></th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- Existing item row -->
                        <tr>
                          <td><a class="cut">-</a><span contenteditable>Front End Consultation</span></td>
                          <td><span contenteditable>Experience Review</span></td>
                          <td><span data-prefix>$</span><span contenteditable>150.00</span></td>
                          <td><span contenteditable>4</span></td>
                          <td><span data-prefix>$</span><span>600.00</span></td>
                        </tr>
                      </tbody>
                    </table>
                    <br/>
                    <a class="add" id="add-item">+</a>

                <table class="balance">
                  <tr>
                    <th><span contenteditable>Total</span></th>
                    <td><span data-prefix>$</span><span>600.00</span></td>
                  </tr>
                  <tr>
                    <th><span contenteditable>Amount Paid</span></th>
                    <td><span data-prefix>$</span><span contenteditable>0.00</span></td>
                  </tr>
                  <tr>
                    <th><span contenteditable>Balance Due</span></th>
                    <td><span data-prefix>$</span><span>600.00</span></td>
                  </tr>
                </table>
              
              </article>
              <aside>
                <h1><span contenteditable>Additional Notes</span></h1>
                <div contenteditable>
                  <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
                </div>
              </aside>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
  </div>
</div>

<script>
  // JavaScript code for dynamic behavior
  document.addEventListener('DOMContentLoaded', function () {
    const addItemButton = document.getElementById('add-item');
    const invoiceItems = document.getElementById('invoice-items').getElementsByTagName('tbody')[0];

    // Add item row when the "+" button is clicked
    addItemButton.addEventListener('click', function () {
      const newRow = invoiceItems.insertRow();
      newRow.innerHTML = `
        <td><a class="cut">-</a><span contenteditable>New Item</span></td>
        <td><span contenteditable>New Description</span></td>
        <td><span data-prefix>$</span><span contenteditable>0.00</span></td>
        <td><span contenteditable>1</span></td>
        <td><span data-prefix>$</span><span>0.00</span></td>
      `;
    });

    // Remove item row when the "-" button is clicked
    invoiceItems.addEventListener('click', function (event) {
      const target = event.target;
      if (target.className === 'cut') {
        const row = target.parentNode.parentNode;
        row.parentNode.removeChild(row);
      }
    });
  });
</script>

@endsection
 