<form class="row" method="GET" action="<?php echo BASE_URL."/Buyer/search"?>"> 
    <div class="col-md-4">
        <div class="form-group"> 
            <input type="number"   name="entry_by_id"  id="entryID" placeholder="Enter entry id" class="form-control">
            <div class="invalid-feedback" style="display:block" id="entryIdErr"></div>
        </div>                            
    </div> 
    <div class="col-md-4">
        <div class="form-group"> 
            <input type="text"   name="dates"  id="dares" placeholder="Enter dates" class="form-control">
            <div class="invalid-feedback" style="display:block" id="datesErr"></div>
        </div>                            

    </div> 
    <div class="col-md-2">
        <div class="form-group"> 
            <input type="submit" value="Submit" class="btn btn-primary form-control"> 
        </div>  
    </div>
</form>
<div class="row mt-5">
    <div class="col-md-12">
        <div class="table-responsive"> 
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Amount</th>
                        <th>Buyer</th>
                        <th>Receipt Id</th>
                        <th>Items</th>
                        <th>Buyer Email</th>
                        <th>Buyer Ip</th>
                        <th>Note</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Hash Key</th>
                        <th>Entry At</th>
                        <th>Entry By</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i = 1;
                        foreach($data as $key){?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $key->amount; ?></td>
                                <td><?php echo $key->buyer; ?></td>
                                <td><?php echo $key->receipt_id; ?></td>
                                <td><?php 
                                    $itemssArray = explode(",", $key->items);
                                    foreach($itemssArray as $item){
                                        echo $item."<br>";
                                    }
                                ?></td>
                                <td><?php echo $key->buyer_email; ?></td>
                                <td><?php echo $key->buyer_ip; ?></td>
                                <td><?php echo $key->note; ?></td> 
                                <td><?php echo $key->city; ?></td> 
                                <td><?php echo $key->phone; ?></td> 
                                <td><?php echo $key->hash_key; ?></td> 
                                <td><?php echo $key->entry_at; ?></td> 
                                <td><?php echo $key->entry_by; ?></td> 
                            </tr>
                    <?php $i++; } ?>
                </tbody> 
            </table>
        </div>
    </div>
</div>