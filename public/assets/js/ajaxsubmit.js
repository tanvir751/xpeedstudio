$(document).ready(function () {
    $('#amount').on('input', function () {
        checkAmount();
    });
    $('#buyer').on('input', function () {
        checkBuyer();
    });
    $('#receiptId').on('input', function () {
        checkReceiptId();
    });
    $('#buyerEmail').on('input', function () {
        checkBuyerEmail();
    });
    $('#note').on('input', function () {
        checkNote();
    });
    $('#city').on('input', function () {
        checkCity();
    });
    $('#phone').click('input', function () {      
        $('#appendPhone').show();
        $('#phone').css("marginLeft","70px");
    }); 
    $('#phone').on('input', function () {       
        checkPhone();
    });
    $('#entryBy').on('input', function () {
        checkEntryBy();
    });
    $('.items').on('input', function () {
        checkItems();
    });

    $('#submitbtn').click(function () { 
        if (!checkAmount() && !checkBuyer() && !checkReceiptId() && !checkBuyerEmail() && !checkNote() &&  !checkCity() && !checkPhone() && !checkEntryBy() && !checkItems()) {
            $("#message").html(`<div class="alert alert-warning">Please fill all required field</div>`);
        } else if (!checkAmount()  || !checkBuyer() || !checkReceiptId() || !checkBuyerEmail() || !checkNote() ||  !checkCity() ||  !checkPhone() || !checkEntryBy() || !checkItems())  {
            $("#message").html(`<div class="alert alert-warning">Please fill all required field</div>`);            
        }
        else {
            
            if(getCookie($('#entryBy').val())){
                $('#message').html("<div class='alert alert-warning'>Your Today's Submission  Limit Expired!</div>");
            }else{

                $("#message").html("");
                var form = $('#SubmissionForm')[0];
                var data = new FormData(form);
                $.ajax({
                    type: "POST",
                    url: "http://localhost/xpeedstudio/Buyer/formSubmit",
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    beforeSend: function () { 
                        $('#submitbtn').attr("disabled", true); 
                    },

                    success: function (data) { 
                        setCookie('entry_by', $('#entryBy').val(), 1);
                        $('#message').html(data);                    
                        $('#SubmissionForm').trigger("reset"); 
                        $('#submitbtn').attr("disabled", false);
 
                    },
                    complete: function () {
                        setTimeout(function () {
                            $('#message').html("");
                        }, 10000);
                    }
                });
            }
        }
    });
});


function checkAmount() {
    var pattern = /^(?=.*\d).{1,10}$/;  
    var amount = $('#amount').val();
    var validamount = pattern.test(amount);
    if(!$('#amount').val()){
        $('#amountErr').html('required field');
        return false;
    }else if (!validamount) {
        $('#amountErr').html('should be numbers only');
        return false;
    } else {
        $('#amountErr').html('');
        return true;
    }
}
function checkBuyer() {
    var pattern = /([A-Za-z0-9\s]+)/;    
    var buyer = $('#buyer').val();
    var validbuyer = pattern.test(buyer);
    if(!$('#buyer').val()){
        $('#buyerErr').html('required field');
        return false;
    }else if ($('#buyer').val().length >  20) {
        $('#buyerErr').html('max length is 20');
        return false;
    }else if (!validbuyer) {
        $('#buyerErr').html('should be numbers and letters');
        return false;
    } else {
        $('#buyerErr').html('');
        return true;
    }
}
function checkReceiptId() {
    var pattern =  /^[a-zA-Z\s]+$/;
    var receiptId = $('#receiptId').val();
    var validreceiptId = pattern.test(receiptId);
    if(!$('#receiptId').val()){
        $('#receiptIdErr').html('required field');
        return false;
    }else if (!validreceiptId) {
        $('#receiptIdErr').html('should be letters');
        return false;
    } else {
        $('#receiptIdErr').html('');
        return true;
    }
}
function checkBuyerEmail() {
    var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var buyerEmail = $('#buyerEmail').val();
    var validbuyerEmail = pattern.test(buyerEmail);
    if (!$('#buyerEmail').val()) {
        $('#buyerEmailErr').html('required field');
        return false;
    } else if (!validbuyerEmail) {
        $('#buyerEmailErr').html('invalid email');
        return false;
    } else {
        $('#buyerEmailErr').html('');
        return true;
    }
}

function checkNote() {
    var pattern =  /([A-Za-z0-9\s]+)/;    
    var Note = $('#note').val();
    var validNote = pattern.test(Note);
    if(!$('#note').val()){
        $('#noteErr').html('required field');
        return false;
    }else if ($('#note').val().length >  30) {
        $('#noteErr').html('max length is 30');
        return false;
    }else if (!validNote) {
        $('#noteErr').html('should be numbers and letters');
        return false;
    } else {
        $('#noteErr').html('');
        return true;
    }
}

function  checkCity(){
    var pattern =  /([A-Za-z0-9\s]+)/;    
    var city = $('#city').val();
    var validNote = pattern.test(city);
    if(!$('#city').val()){
        $('#cityErr').html('required field');
        return false;
    }else if ($('#city').val().length >  30) {
        $('#cityErr').html('max length is 30');
        return false;
    }else if (!validNote) {
        $('#cityErr').html('should be numbers and letters');
        return false;
    } else {
        $('#cityErr').html('');
        return true;
    }
} 
function checkPhone() { 
    
    if(!$('#phone').val()){
        $('#phoneErr').html('required field');
        return false;
    }else if (!$.isNumeric($("#phone").val())) {
        $("#phoneErr").html("only number is allowed");
        return false;
    } else if ($("#phone").val().length != 10) {
        $("#phoneErr").html("10 digit required");
        return false;
    }
    else {
        $("#phoneErr").html("");
        return true;
    }
}

function checkEntryBy() {
    if(!$('#entryBy').val()){
        $('#entryByErr').html('required field');
        return false;
    }else if (!$.isNumeric($("#entryBy").val())) {
        $("#entryByErr").html("only number is allowed");
        return false;
    }  
    else {
        $("#entryByErr").html("");
        return true;
    }
}

function checkItems() {
    var pattern =  /([A-Za-z0-9\s]+)/;    
    var items = $('#items').val();
    var validitems= pattern.test(items);
    if(!$('#items').val()){
        $('#itemsErr').html('required field');
        return false;
    } else if (!validitems) {
        $('#itemsErr').html('should be numbers and letters');
        return false;
    } else {
        $('#itemsErr').html('');
        return true;
    }
}

function setCookie(cName, cValue, expDays) {
    let date = new Date();
    date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
    const expires = "expires=" + date.toUTCString();
    document.cookie = cName + "=" + cValue + "; " + expires + "; path=/";
}


function getCookie(cName) {
    const name = cName + "=";
    const cDecoded = decodeURIComponent(document.cookie); //to be careful
    const cArr = cDecoded .split('; ');
    let res;
    cArr.forEach(val => {
        if (val.indexOf(name) === 0) res = val.substring(name.length);
    })
    return res;
}