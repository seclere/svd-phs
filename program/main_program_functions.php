<?php



function google_analytics($analytics)
{

  if ($analytics) echo
'    <!-- Global Site Tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107071916-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments)};
      gtag(\'js\', new Date());
      gtag(\'config\', \'UA-107071916-2\');
    </script>
';
}

function facebook_head()
{
  $tmp_text = '<div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = \'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0\';
        fjs.parentNode.insertBefore(js, fjs);
        }(document, \'script\', \'facebook-jssdk\'));
      </script>';

  return $tmp_text;
}

function facebook_code()
{
  $tmp_text = '<div class="fb-page" data-href="https://www.facebook.com/SVD-Philippines-South-297911703563214/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/SVD-Philippines-South-297911703563214/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/SVD-Philippines-South-297911703563214/">Facebook</a></blockquote></div>';

  return $tmp_text;
}
?>
