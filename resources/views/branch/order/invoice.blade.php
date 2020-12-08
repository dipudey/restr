<!doctype html>
  <html>
  <head>
      <meta charset="utf-8">
      <title>A simple, clean, and responsive HTML invoice template</title>

      <style>
      .invoice-box {
          max-width: 600px;
          margin: auto;
          padding: 30px;
          border: 1px solid #eee;
          box-shadow: 0 0 10px rgba(0, 0, 0, .15);
          font-size: 16px;
          line-height: 24px;
          font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
          color: #555;
      }

      .invoice-box table {
          width: 100%;
          line-height: inherit;
          text-align: left;
      }

      .invoice-box table td {
          padding: 5px;
          vertical-align: top;
      }

      .invoice-box table tr td:nth-child(2) {
          text-align: right;
      }

      .invoice-box table tr.top table td {
          padding-bottom: 20px;
      }

      .invoice-box table tr.top table td.title {
          font-size: 45px;
          line-height: 45px;
          color: #333;
      }

      .invoice-box table tr.information table td {
          padding-bottom: 40px;
      }

      .invoice-box table tr.heading td {
          background: #eee;
          border-bottom: 1px solid #ddd;
          font-weight: bold;
      }

      .invoice-box table tr.details td {
          padding-bottom: 20px;
      }

      .invoice-box table tr.item td{
          border-bottom: 1px solid #eee;
      }

      .invoice-box table tr.item.last td {
          border-bottom: none;
      }

      .invoice-box table tr.total td:nth-child(2) {
          border-top: 2px solid #eee;
          font-weight: bold;
      }

      @media only screen and (max-width: 600px) {
          .invoice-box table tr.top table td {
              width: 100%;
              display: block;
              text-align: center;
          }

          .invoice-box table tr.information table td {
              width: 100%;
              display: block;
              text-align: center;
          }
      }

      /** RTL **/
      .rtl {
          direction: rtl;
          font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
      }

      .rtl table {
          text-align: right;
      }

      .rtl table tr td:nth-child(2) {
          text-align: left;
      }
      #customers {
          font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
          text-align: center;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        /* #customers tr:nth-child(even){background-color: #f2f2f2;} */

        /* #customers tr:hover {background-color: #ddd;} */

        #customers th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: center;
          color: black;

        }
      </style>
  </head>

  <body>
      <div class="invoice-box">
          <table cellpadding="0" cellspacing="0">
              <tr class="top">
                  <td colspan="2">
                      <table>
                        <tr>
                           <td colspan="2" style="text-align:center" class="noborder">
                               <h2> {{ $restarunt->restaurant_name }}</h2>
                            </td>
                        </tr>
                      </table>
                      <table style="font-family: Times New Roman; font-size: 14.5px !important;margin:auto;margin-top:-30px" >
                       <tr>
                          <td colspan="" style="text-align:center;" class="">
                            <h4 style="margin:auto;width:55%;margin-bottom:11px">{{ $restarunt->address }}</h4>
                          </td>
                       </tr>
                       <tr>
                         <td style="text-align:center">
                           <h4 style="margin-top: -40px;"><strong>Mobile</strong> : {{ $restarunt->phone }}</h4>
                         </td>
                       </tr>
                      </table>
                  </td>
              </tr>

              <tr class="information">
                  <td colspan="">
                      <table>
                          <tr>
                              <td>
                                  <strong>Invoice</strong> : restro{{ $sale->id }}<br>
                              </td>
                          </tr>
                      </table>
                  </td>
                  <td>

                    <table>
                        <tr>
                            <td>
                                <strong>Date</strong> : {{ $sale->order_date }}<br>
                            </td>
                        </tr>
                    </table>

                  </td>
              </tr>

              <tr class="heading">
                <table id="customers">

                  <tr>
                    <th>SL. NO.</th>
                    <th>Particulars</th>
                    <th>Quantity</th>
                    <th>U.Price</th>
                    <th>Amount</th>
                  </tr>

                    @foreach ($sale->orderFoods as $item)
                        <tr style="height:25px">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->food->food_name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->total_price }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="50" style="text-align: center">Total = {{ $sale->orderFoods->sum('total_price') }}</td>
                    </tr>


                </table>


              </tr>

              <tr>
                <td>
                  <h3 style="margin-top:35px">...........................</h3>
                  <h5 style="margin-top:-24px">Authorzed Signature</h5>
                </td>
              </tr>

          </table>
      </div>
  </body>
  </html>