{literal}
<script type="text/javascript">
<!--
var i = 0;
$(function(){
    $('#more').click(function(){
        $.ajax({
            url: "../../php/loadmore.php",
            type: "POST",
            data: {
                index: i,
            },
            success: function(data){
                if(data){
                    $("#list").append(data);
					i++;
                }else{
                    $("#list").append('No more posts to show.....');
                }
            }
        });
    });
});
// -->
</script>
{/literal}
