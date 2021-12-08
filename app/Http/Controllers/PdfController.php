<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\Client;
use App\Models\Caddy;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class PdfController extends Controller
{
    //
    //
    public function voir_pdf($id, $client_id)
    {


        Session::put('id', $id);
        Session::put('client_id', $client_id);

        try {

            $pdf = App::make('dompdf.wrapper')->setPaper('a4', 'landscape');
            $pdf->loadHTML($this->convert_orders_data_to_html());

            return $pdf->stream();
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }


    public function convert_orders_data_to_html()
    {

        $order = Order::where('id', Session::get('id'))->first();
        $name = $order->client->lastname;
        $phone = $order->client->phone;
        $city = $order->client->city;
        $address = $order->client->numero;
        $email = $order->client->email;
        $date = $order->client->created_at;

        //récuperation de l'image
        $path = base_path('logo.jpg');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);




        $output = '<html>
<head>
    <meta charset="utf-8">
    <title>securTrack</title>

    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
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
        text-align: center;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
        text-align: left;
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
        font-family: Tahoma, "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
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


                <td class="title">
                    <a class="navbar-brand brand-logo mr-5">' .
            '<img src="' . $logo . '" class="mr-2" height="100px" width="100px"/>' . ' </a>
                            <h3>SECURTRACK</h3>
                        </td>


                        <td>
                            No: SECUR#' . $order->numero . ' <br>
                            Date: ' . $date->format('d/m/Y h:m') . '
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

   <tr class="information">
            <td colspan="2">
                <table>
                    <tr>
                        <td>
                            ' . $city . '<br>
                            ' . $address . '
                        </td>

                        <td>
                            ' . $name . '<br>
                            ' . $email . '
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <table>
    <tr class="heading">
        <td>
           Nom
        </td>
        <td>
            Quantité
        </td>
        <td>
            Prix Unitaire
        </td>
        <td>
            Price
        </td>
    </tr>';
        $total = 0;
        foreach ($order->contents as $caddy) {
            $output .= '
                      <tr class="item">
                          <td>
                              ' . $caddy->product->product_name . '
                         </td>
                          <td style="text-align:center">' . $caddy->quantite . '</td>
                          <td style="text-align:center">' . $caddy->product->product_price . ' FCFA</td>
                          <td style="text-align:center">
                          ' . $caddy->product->product_price * $caddy->quantite . ' FCFA
                          </td>
                          <hr style="border-width:0;color:white;background-color:white">
                     </tr>';

            $total += $caddy->product->product_price * $caddy->quantite;
        }

        $output .= '<tr class="total">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td style="text-align:center">
            Total  :   ' . $total . '  FCFA
                    </td>
                      </tr>
                   </table>
               </table>
               </div>
              </body>
           </html>';

        return $output;
    }
}
