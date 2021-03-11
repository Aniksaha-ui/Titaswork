<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin-top: 100px;
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
    </style>
</head>

<body>
   


    <div class="invoice-box">
        <table class="table table-responsive" cellpadding="0" cellspacing="0">
            <tr class="top">
                sadjsldjalksdja
            </tr>
        
            
          <!--   <tr class="heading">
                <td>
                    Payment Method
                </td>
                
                <td>
                    Check #
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    Check
                </td>
                
                <td>
                    1000
                </td>
            </tr> -->
            
            <tr class="heading">
               <td style="font-size: 12px; text-align: justify;">Product name</td>
                <td style="font-size: 12px; text-align: justify;">Product name</td>
                <td style="font-size: 12px; text-align: justify;">catagory</td>
                <td style="font-size: 12px; text-align: justify;">orginal price</td>
                <td style="font-size: 12px; text-align: justify;">Shopper's price</td>
                <td style="font-size: 12px; text-align: justify;">Dealer's price</td>
                <td style="font-size: 12px; text-align: justify;">Whole's price</td>
                <td style="font-size: 12px; text-align: justify;">Stock</td>
            </tr>
            
            @foreach($product as $product)
            <tr class="item">
                <td style="font-size: 12px; text-align: justify;">{{$product->id}}</td>
                <td style="font-size: 10px; text-align: justify;">{{$product->p_name}}</td>
                <td style="font-size: 10px; text-align: justify;">{{$product->c_name}}</td>
                <td style="font-size: 10px; text-align: justify;">{{$product->p_price}}</td>
                <td style="font-size: 10px; text-align: justify;">{{$product->s_price}}</td>
                <td style="font-size: 10px; text-align: justify;">{{$product->d_price}}</td>
                <td style="font-size: 10px; text-align: justify;">{{$product->w_price}}</td>
                <td style="font-size: 10px; text-align: justify;">{{$product->p_quan}}</td>
               
              
            </tr>
            @endforeach
            
          
            
           <!--  <tr class="total">
                <td></td>
                
                <td>
                   Total: $385.00
                </td>
            </tr> -->
        </table>
    </div>
</body>
</html>