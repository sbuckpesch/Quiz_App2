/*
 * Authorize Application
 */
function fbAuthUser(appID, scope, redirect_uri) {
	var permsGranted;
	permsGranted = true;
	var url = "top.location.href='" + redirect_uri + "'";
	var res = FB.ui({
		   method: 'permissions.request',
		   'perms': scope,
		   'display': 'popup'
		  },
			function(response) {				
			  	if (response.perms != null && isSetProperSubset(scope.split(","), response.perms.split(","))) {
					setTimeout(url, 50);
				}
			}
	);

	
};

function isSetProperSubset(subset, superset) {
	  // first check lengths
	  if (subset.length > superset.length) {
	    return false;
	  }

	  var lookup = {};

	  for (var j in superset) {
	    lookup[superset[j]] = superset[j];
	  }

	  for (var i in subset) {
	    if (typeof lookup[subset[i]] == 'undefined') {
	      return false;
	    } 
	  }
	  return true;
};

function fbPostToWall(name, message, caption, desc, link, picture) {  
    FB.ui({
          method: 'feed',
          name: name,
          message: message,
          caption: caption,
          description: desc,
          link: link,
          picture: picture
    });
};

function fbSendRequest(message) {
	FB.ui({
		method: 'apprequests',
		message: message
	})
};

function fbPostToUserWall(name,caption,description,link,picture)
{
  var params={'link':link, 'picture':picture, 'name':name, 'caption':caption, 'description':description };

  FB.api('/me/feed','post',params,function(response){
  });
}

function fbUserPageIds()
{
	var permsGranted;
	permsGranted = true;
	var res = FB.ui({
		   method: 'permissions.request',
		   'perms': 'email',
		   'display': 'popup'
		  },
			function(response) {				
			  	//if (response.perms != null && isSetProperSubset(scope.split(","), response.perms.split(","))) {
			  	if (response.perms != null )
          {
            FB.api('/me',function(data){
               
            displayObject(data);
            });
				}
			}
	);

	
  /*
  var fql    =   "select page_id from page_admin where uid=" . uid;

  var page_ids = FB.Data.query(fql);
  alert(page_ids);
  */

  /*
  query.wait(function(rows) {
    document.getElementById('name').innerHTML =
    'Your name is ' + rows[0].name;
  });
  */

}
