{literal}
<script type="text/javascript">
<!--
var i = 0;

function readman(){
        $.ajax({
            url: "../../php/loadmore.php",
            type: "POST",
            data: {
                index: i,
            },
            success: function(data){
                if(data){
                    $("#list").append(data);
					$("#my_img"+i).bind("load", function(){
						// 処理
						i++;
						readman();
					});
                }else{
                    $("#list").append('No more posts to show.....');
                }
            }
        });
}

$(document).ready(function(){
    // ここに実際の処理を記述します。
	readman();
  });


// -->
</script>
{/literal}
