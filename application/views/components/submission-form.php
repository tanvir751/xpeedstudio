
<div id="message"></div>

<form  method="POST" id="SubmissionForm">             
    <div class="row">
        <div class="col-md-6">
            <div class="form-group"> 
                <input type="number"   name="amount"  id="amount" placeholder="Enter amount" class="form-control">
                <div class="invalid-feedback" style="display:block" id="amountErr"></div>
            </div>                            
        </div> 
        <div class="col-md-6">
            <div class="form-group"> 
                <input type="text" name="buyer" id="buyer" placeholder="Enter buyer" class="form-control " >
                <div class="invalid-feedback" style="display:block" id="buyerErr"></div>
            </div>                                       
        </div> 
        <div class="col-md-6">
            <div class="form-group"> 
                <input type="text" name="receipt_id" id="receiptId" placeholder="Enter receipt id" class="form-control " >
                <div class="invalid-feedback" style="display:block" id="receiptIdErr"></div>
            </div>   
        </div> 
        <div class="col-md-6 fieldGroup">
            <div class="form-group ">
                <div class="input-group">
                    <input type="text" name="items[]" class="form-control" id="items" placeholder="Enter item"/>
                    <div class="input-group-addon"> 
                        <a href="javascript:void(0)" class="btn btn-success addMore"> Add</a>
                    </div>
                </div>                                        
                <div class="invalid-feedback" style="display:block" id="itemsErr" ></div>
            </div>
        </div> 
        <div class="col-md-6"> 
            <div class="form-group"> 
                <input type="email" name="buyer_email" id="buyerEmail" placeholder="Enter buyer email" class="form-control " >
                <div class="invalid-feedback" style="display:block" id="buyerEmailErr"></div>
            </div>   
        </div> 
        <div class="col-md-6">                                    
            <div class="form-group"> 
                <input type="text" name="note" id="note" placeholder="Enter note" class="form-control " > 
                <div class="invalid-feedback" style="display:block" id="noteErr"></div>
            </div>
        </div>
        <div class="col-md-6">                                                                
            <div class="form-group"> 
                <input type="text" name="city" id="city" placeholder="Enter city" class="form-control " >
                <div class="invalid-feedback" style="display:block" id="cityErr"></div>
            </div> 
        </div> 
        <div class="col-md-6"> 
            <div class="form-group ">
                <div class="input-group">
                    <input type="number" name="phone" class="form-control" id="phone" placeholder="Enter phone" />
                    <div class="" id="appendPhone" style="position:absolute; display:none"> 
                        <a href="javascript:void(0)" class="btn btn-secondary" > 880</a>
                    </div>
                </div>                                        
                <div class="invalid-feedback" style="display:block" id="phoneErr" ></div>
            </div>     
        </div>
        <div class="col-md-6">    
            <div class="form-group"> 
                <input type="number" name="entry_by" id="entryBy" placeholder="Enter entry by" class="form-control " >
                <div class="invalid-feedback" style="display:block" id="entryByErr"></div> 
            </div>   
        </div>  
        <div class="col-md-12">  
            <div class="form-group"> 
                <input type="button" id='submitbtn' value="Submit" class="btn btn-primary mt-5 form-control"> 
            </div>  
        </div>
    </div>           
    
</form>
 