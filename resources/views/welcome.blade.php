<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <x-head/>


    <body class="antialiased">
        
    <x-header/>

        <div class="homeMainContainer">
            <div class="subscribeFormContainer homeMainContainerHeight">
                <form id="frm"> 
                <div>
                    <label class="subscribeLabel">Subscribe For Newsletters</label>    
                </div>
                <div>
                    <input type="text" class="subscribeInput" name="email" placeholder="Enter your Email here"/>
                </div>
                <div class="txt-cnt">
                    <input type="submit" name="frmsubmit" class="submitBtn" value="Subscribe" />
                </div>
                @csrf
                </form>

                <div id="response" class="txt-cnt" style="margin-top:20px;"></div>
            </div>
        </div>
        <script>
            jQuery("#frm").submit(function(e){
                e.preventDefault();
                
                jQuery.ajax({
                    url : '{{url("form_submit")}}',
                    data : jQuery('#frm').serialize(),
                    type : 'post',
                    success : function(res){
                        if(res.status=="200"){
                            jQuery("#response").css("color","green");
                            jQuery("#response").text(res.result);
                        }else{
                            jQuery("#response").css("color","red");
                            jQuery("#response").text(res.result);
                        }
                        
                    }
                });
            });
        </script>

    </body>
</html>
