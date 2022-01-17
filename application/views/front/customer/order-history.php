
  <div class="inner-banner"> 
      <div class="container h-100">
        <div class="row h-100 justify-content-center text-center align-items-end">
          <div class="col-md-6">
            
          </div>
        </div>
      </div>
    </div>
<section class="about">
  <div class="container">
    <div class="row">
      <?php $this->load->view('front/customer/side-nav'); ?>
      <div class="col-sm-10">
        <table id="example1" class="table  table-responsive">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Customer Name</th>
              <th>Order Number</th>
              <th>Order Total</th>
              <th>Discount Amount</th>
              <th>Shipping Amount</th>
              <th>Amount To Pay</th>
              <th>Order Type</th>
              <th>Paid Currency</th>
              <th>View Invoice</th>
            </tr>
          </thead>
          <tbody>

            <?php if (!empty($orders)) : $i = 1;
              foreach ($orders as $order) : ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $order->first_name . ' ' . $order->last_name; ?></td>
                  <td><?php echo $order->orders_no; ?></td>
                  <td><?php echo $order->orders_total_amt; ?></td>
                  <td><?php echo $order->orders_diss_amt; ?></td>
                  <td><?php echo $order->shipping_charges; ?></td>
                  <td><?php echo $order->total_with_ship; ?></td>
                  <td><?php echo $order->order_type; ?></td>
                  <td><?php echo $order->currency; ?></td>
                  <td><a style="color:#000;" href="<?php echo base_url('customer-invoice/') . $order->orders_id; ?>" target="_blank">View Invoice</a></td>
                </tr>
            <?php endforeach;
            endif; ?>

          </tbody>
        </table>

      </div>
    </div>
  </div>
</section>