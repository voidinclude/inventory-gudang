<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<h1>MARIA BABY GARMEN</h1>
SALES INVOICE
<table>
  <tr>
    <th>NO SO</th>
    <th>TGL SO</th>
    <th>CUSTOMER</th>
  </tr>
  <tr>
    <td>{{$salesorders->soNo}}</td>
    <td>{{$salesorders->orderDate = date('Y-m-d')}}</td>
    <td>{{$salesorders->customerName}}</td>
  </tr>
</table>