<!DOCTYPE html>
<html lang="en">
  <head>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style type="text/css">
  
.clearfix:after {
  content: "";
  display: table;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
  font-size: 1.3em;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
  font-size: 1.3em;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.3em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}

@media print {
  /* style sheet for print goes here */
  .notneededprintingfiles {
    visibility: hidden;
  }
}

</style>

    <meta charset="utf-8">
  
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{asset('cicohomepage/images/cicotech.jpg')}}">
      </div>
      <h1>INVOICE</h1>
      <div id="company" class="clearfix">
        <div>Company Name : Cico Tech</div>
        <div>Address : Uttora,Dhaka</div>
        <div>Contact Info : 01982640140</div>
        <div><a href="mailto:company@example.com">Titas@gmail.com</a></div>
      </div>
      @foreach($searchBill2 as $searchBill2)
      <div id="project">
        <div><span>CLIENT</span> {{$searchBill2->name}}</div>
        <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
        <div><span>EMAIL</span> <a href="{{$searchBill2->email}}">{{$searchBill2->email}}</a></div>
        <div><span>Order DATE</span>{{$searchBill2->order_date}}</div>
        
      </div>
      @endforeach
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Order ID</th>
            <th class="desc">Product Name</th>
            <th>Quantity</th> 
            <th>Product Price</th>
            <th>Orginal price</th>
            <th>After Discount</th>
          <th class ="notneededprintingfiles">Action</th>
          </tr>
        </thead>
        <tbody>

          @foreach($searchBill as $searchBill)
          <tr>
            <td class="service">{{$searchBill->order_id}}</td>
            <td class="desc">{{$searchBill->p_name}}</td>
            <td class="unit">{{$searchBill->order_quantity}}</td>
            <td class="total">{{$searchBill->product_selling_price}}
            <td class="qty">{{$searchBill->order_quantity*$searchBill->product_selling_price}}</td>
            <td class="total">{{$searchBill->order_subtotal}}</td>
             <td class = "notneededprintingfiles"><a href="{{URL('allorder/edit/'.$searchBill->order_id)}}" class="btn btn-success">
                 <span  class="glyphicon glyphicon-edit">Edit</span>  
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>


      <h3 style="text-align: right; font-size: 1.2em; margin-right: 15%; font-weight: bold;">Total Amount : {{$order_grandtotal}}</h3>
      <h2 style="text-align:left;  font-size: 1.2em; font-weight: bold;" >Discounted products(In tk) : 
     @foreach($discounted_products2 as $discounted_products2)
     {{$discounted_products2->p_name}}(order id : {{$discounted_products2->order_id}})(Discount Amount : {{$discounted_products2->order_carts_discount_in_tk}} tk), 
     @endforeach 
     </h2>
     <h2 style="text-align:left; font-size :1.2em; font-weight: bold;">Discounted products(In percentage) :
     @foreach($discounted_products3 as $discounted_products3)
     {{$discounted_products3->p_name}}(Order ID : {{$discounted_products3->order_id}})(Discount amount : {{$discounted_products3->order_carts_discount_in_percentage}}%), 
     @endforeach 
   </h2>

   <h2 style="text-align: left; font-size: 1.2em; font-weight: bold;">Overall Discounted Products : 
    @foreach($discounted_products1 as $discounted_products1)
      {{$discounted_products1->p_name}}(Order ID : {{$discounted_products1->order_id}})(Discount Amount : {{$discounted_products1->order_discount_amount}}), 
    @endforeach
   </h2>
   <br>
  <br>
   <h2></h2>
   <h2></h2>
    

      <center>
      <button style="margin-bottom: 20px;" class="btn btn-primary hidden-print" onclick="javascript:window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
      </center>


      <p style="font-size: .6"></p>
      <div id="notices">
        <!-- <div>NOTICE:</div> -->
        <div class="notice">
        <!-- A finance charge of 1.5% will be made on unpaid balances after 30 days.</div> -->

      </div>
       
    </main>
    <footer>
      <!-- Invoice was created on a computer and is valid without the signature and seal. -->
    </footer>
  </body>
</html>