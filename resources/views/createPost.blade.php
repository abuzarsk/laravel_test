<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <x-head/>
    <body class="antialiased">
        
            <x-header/>

        <div class="createPostMainContainer">
            <div class="subscribeFormContainer">

                <form id="postSubmit">

                <div style="margin-top:50px;">
                    <label class="subscribeLabel">Post Title</label>    
                </div>
                <div>
                    <input type="text" name="title" class="subscribeInput" placeholder="Enter Title here..."/>
                </div>
                <div style="margin-top:30px;">
                    <label class="subscribeLabel">Post Description</label>    
                </div>
                <div>
                    <textarea class="subscribeInput textarea" name="description" placeholder="Enter Title here..."></textarea>
                </div>
                <div class="txt-cnt">
                    <input type="submit" class="submitBtn" name="postSubmit" value="Post" />
                </div>

                @csrf

                </form>
                <div id="response" class="txt-cnt" style="margin-top:20px;"></div>

            </div>
        </div>

        <script>
            jQuery("#postSubmit").submit(function(e){
                e.preventDefault();
                
                jQuery.ajax({
                    url : '{{url("postsubmit")}}',
                    data : jQuery('#postSubmit').serialize(),
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
