
  <div class="inner-banner"> 
      <div class="container h-100">
        <div class="row h-100 justify-content-center text-center align-items-end">
          <div class="col-md-6">
            
          </div>
        </div>
      </div>
    </div>
<div class="container">
<div id="invoice">
    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="<?php echo base_url();?>">
                            <img src="<?php echo base_url('uploads/settings/').$this->settings->header_logo_image; ?>" data-holder-rendered="true" />
                            </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">

                           <?php echo $this->settings->site_title; ?>
                          
                        </h2>
                        <div><?php echo $this->settings->address; ?></div>
                        <div><?php echo $this->settings->email_add; ?></div>
                        <div><?php echo $this->settings->phone_no; ?></div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to"><?php echo $order->first_name.' '.$order->last_name; ?></h2>
                        <div class="address"><?php echo $order->address; ?></div>
                        <div class="email"><a href="mailto:<?php echo $order->email; ?>"><?php echo $order->email; ?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h2 class="invoice-id"><?php echo $order->orders_no?></h2>
                        <div class="date">Date of Invoice: <?php echo $order->orders_date?></div>
                        <div style="color:<?php echo ($order->order_type == 'PAID')? 'green':'red'; ?>" class="date" >Pay Status: <?php echo $order->order_type?></div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">Name</th>
                            <th class="text-right">Price</th>
                            <th class="text-right">Quantity</th>
                            <th class="text-right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $orderDetails = $this->global_model->records_all('order_items',array('orders_no' => $order->orders_no)); ?>
                        
                        <?php if(!empty($orderDetails)): $i=1; foreach($orderDetails as $item):?>
                        <tr>
                            <td class="no"><?php echo $i++;?></td>
                            <td class="text-left"><h3><?php echo $item->product_name; ?></h3></td>
                            <td class="unit"><?php echo $order->currency;?><?php echo $item->product_price?></td>
                            <td class="qty"><?php echo $item->product_qty;?></td>
                            <td class="total"><?php echo $order->currency;?><?php echo $item->order_items_total_amt?></td>
                        </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SUBTOTAL</td>
                            <td><?php echo $order->currency;?><?php echo $order->orders_sub_total_amt; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">DISCOUNT</td>
                            <td><?php echo $order->currency;?><?php echo $order->orders_diss_amt; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">SHIPPING</td>
                            <td><?php echo $order->currency;?><?php echo $order->shipping_charges; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">GRAND TOTAL</td>
                            <td><?php echo $order->currency;?><?php echo $order->total_with_ship; ?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">© <?php echo date('Y'); ?> <a href="<?php echo base_url();?>">Cuban Lash</a> All Rights Reserved</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
</div>
<style>
#invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 190px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}
</style>