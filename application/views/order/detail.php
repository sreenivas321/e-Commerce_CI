<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="col-sm-6">
<h3>No. Order        <span>  : <?php echo $orderrow->id;?></span></h3>
<h4>Date Confirm Payment <span>  : <?php echo tgl_indo_timestamp($orderrow->date_confirm); ?></span></h4>
</div>

<div class="col-sm-6">
<h4>Nama Customer    <span>  : <?php echo $orderrow->user_id;?></span></h4>
<h4>Kota <span> : <?php echo $orderrow->nama_kota;?></span></h4>
<h4>Alamat <span> : <?php echo $orderrow->alamat;?></span></h4>
</div>
<div class="col-sm-4">
<h4>Status Order : <span><code><?php echo $orderrow->status;?></code></span>   </h4> 
</div>

<!-- /.row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $title;?>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover" id="table-list-order">
                    <thead>
                    <tr>
                    <th>Product id</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>price</th>
                    <th>Subtotal</th>
                    <th></th>
                    </tr>
                    </thead>
                    <tbody>
                <!-- load products from table -->
                <?php 
                  $total = 0;
                  $qtytotal = 0;
                  foreach ($orders as $order ) : 
                  $subtotal = $order->qty * $order->price;
                  $qtytotal += $order->qty;
                  $total += $subtotal;
                ?>
                  <tr>
                    <td><?= $order->product_id ?></td>  
                    <td><?= $order->product_type ?></td>
                    <td><?= $order->qty ?></td>
                    <td><?= rupiah($order->price, 1) ?></td>
                    <td><?= rupiah($subtotal, 1) ?></td>
                    <td></td>
                  
                  </tr>
                  <?php endforeach; ?>
                  <tfoot>
                  <tr>
                      <td align="right" colspan="5">Total Quantity :</td>
                      <td><?=$qtytotal?></td>
                    </tr>
                    <tr>
                      <td align="right" colspan="5">Shipping Cost :</td>
                      <td><?= rupiah($order->ongkos_kirim, 1)?></td>
                    </tr>
                    <tr>
                      <td align="right" colspan="5">Payment Total :</td>
                      <td><?=rupiah($total + $order->ongkos_kirim, 1) ?></td>
                    </tr>
                  </tfoot>
                  
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(function(){
    $('#table-list-order').DataTable({
        responsive: true
    });
})
</script>
