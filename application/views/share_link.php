<style>
	.social_icon{cursor: pointer;}
</style>
	<a href="#" class="social_icon icon-square-outline facebook-outline" social="facebook"><i class="fab fa-facebook-f"></i></a>
	<a href="#" class="social_icon icon-square-outline twitter-outline" social="twitter"><i class="fab fa-twitter"></i> </a>
	<a href="#" class="social_icon icon-square-outline linkedin-outline" social="linkedin"><i class="fab fa-linkedin-in"></i></a>
	<a href="#" class="social_icon icon-square-outline pinterest-outline" social="pinterest"><i class="fab fa-pinterest-p"></i></a>
	
	
<li style="display:none;">
<a class="social_icon user-media facebook" social="facebook"><i class="fa fa-facebook"></i></a>
<a class="social_icon user-media twitter" social="twitter"><i class="fa fa-twitter"></i></a>
<a class="social_icon user-media linke" social="linkedin"><i class="fa fa-linkedin"></i></a>
<a class="social_icon user-media whatsapp" social="whatsapp"><i class="fa fa-whatsapp"></i></a>
<a class="social_icon user-media skype" social="skype"><i class="fa fa-skype"></i></a>
<a class="social_icon user-media google" social="mail"><i class="fa fa-envelope"></i></a>
<a class="social_icon user-media google" social="pinterest"><i class="fa fa-pinterest"></i></a>
<a class="social_icon user-media google" social="reddit"><i class="fa fa-reddit"></i></a>
<a class="social_icon user-media google" social="tumblr"><i class="fa fa-tumblr"></i></a>
</li>
<!-- https://github.com/bradvin/social-share-urls/blob/master/code/php/SocialMedia.php -->
<script>
$('document').ready(function () {
	function checkIfUserOnMobile(){
        if(navigator){
            var ua = navigator.userAgent;
			console.log(ua);
            if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini|Mobile|mobile|CriOS/i.test(ua)){
                // if website open in mobile
                return true;
            }
            return false;
        }else{
            return false;
        }
    }
	
	$('body').on('click','.social_icon',function() {
		var link_url =  $(window.parent.location).attr('href');
		var link_title =  '';
	    var link_url_for_share =  $('.link_url_for_share').val();
	    var title_for_share =  $('.title_for_share').val();
		if(link_url_for_share){
			link_url =  link_url_for_share;
		}if(title_for_share){
			link_title =  title_for_share;
		}
	   
		
		  var plateform = $(this).attr('social');
		  console.log(plateform);
		  console.log(title_for_share);
		 let myUrl = '';
		 if(plateform == 'facebook'){
		  myUrl = "https://www.facebook.com/sharer/sharer.php?u="+link_url;
		 }else if(plateform == 'twitter'){
			 //'https://twitter.com/intent/tweet?url=' . $url . '&text=' . $text . '&via=' . $via . '&hashtags=' . $hash_tags,
			myUrl = "https://twitter.com/intent/tweet?url="+link_url+"&text=" +link_title;
		 }else if(plateform == 'linkedin'){
			myUrl = "https://www.linkedin.com/shareArticle?mini=true&url="+link_url+'&title='+link_title+'&summary='+link_title+'&source=myaajivika.com';
		 }else if(plateform == 'pinterest'){
			myUrl = "http://pinterest.com/pin/create/button/?url="+link_url;
		 }else if(plateform == 'reddit'){
			myUrl = "https://reddit.com/submit?url="+link_url+"&title="+link_title;
		 }else if(plateform == 'tumblr'){
			 //https://www.tumblr.com/widgets/share/tool?canonicalUrl=' . $url . '&title=' . $title . '&caption=' . $desc . '&tags=' . $hash_tags,
			myUrl = "https://www.tumblr.com/widgets/share/tool?canonicalUrl="+link_url+"&title="+link_title+"&caption="+link_title;
		 }else if(plateform == 'whatsapp'){
			 if(checkIfUserOnMobile()){
                myUrl = "whatsapp://send?text="+link_url;
            }else{
                myUrl = "https://web.whatsapp.com/send?text="+link_url;
            }
		 }
		 else if(plateform == 'skype'){
			myUrl = "https://web.skype.com/share?url="+link_url+"&text="+link_title;
		 }
		 else if(plateform == 'mail'){
			myUrl = 'mailto:?body='+link_url+"subject="+link_title;
		 }
		  //myUrl += link_url;
		  console.log(myUrl);
		  
		let a = document.createElement('a');
        a.href = myUrl;
        a.target = '_blank';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
			//$("a.shareurl").attr("href", myUrl);
			
			//setTimeout(function(){$('.shareurl').trigger('click');}, 100);
	});

});
</script>