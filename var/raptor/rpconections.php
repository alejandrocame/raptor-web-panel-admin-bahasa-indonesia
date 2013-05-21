<?php
session_start();
include_once "main/auth.php";
include_once "main/functions.php";
include_once "lang/Spanish.lang.php";
include_once "lang/".$_SESSION["ws"]["langUser"].".lang.php";
$nomSrv=$_SESSION["ws"]["listeServeur"][0];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>RaptorWebPanel 1.0</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="charset" content="ISO-8859-1" />
	<link rel="shortcut icon" href="imgpng/tc.png" />       
       <link rel="stylesheet" href="css/style.css" type="text/css" />
       <link href="css/table_styles.css" rel="stylesheet" type="text/css" />        	   
	<style type="text/css">
		<!--
			
		-->
	</style>
	
	<script>(function () {
  var sourceBaseUrl = /[&?]distrib/.test(location.search)
      ? "hight/code/" : "hight/src/";
  var sources = [
      "prettify.js",
      "lang-css.js",
      // Language extensions tested.       
 ];
  var styles = [
      "prettify.css"
  ];
  if (window.console) {
    console.log("sourceBaseUrl=" + sourceBaseUrl);
  }
  for (var i = 0; i < sources.length; ++i) {
    document.write(
        "<script src=\"" + sourceBaseUrl + sources[i] + "\"><\/script>");
  }
  for (var i = 0; i < styles.length; ++i) {
    document.write(
        "<link rel=\"stylesheet\" href=\"" + sourceBaseUrl + styles[i] + "\">");
  }
})();
</script>


<script src="hight/base.js" type="text/javascript"
 onerror="alert('Error: failed to load ' + this.src)"></script>
<link rel="stylesheet" type="text/css" href="hight/styles.css" />
</head>
	
</head>
<body onload="go(goldens)">

<div id="all"><!-- GERAL --> 
<br />
<div id="tbod"> 
<div>
  <?php include('header.php')?>
 </div>

	<!-- top navigation pannel end -->
<br />
<h1>Total Connections by User</h1>

<div style="width:980px; padding:6px 0 6px 0">
<div id="edit">
<div style="float:right;padding:0px 10px 10px 0px;background:#e0e9f6;" id="but2">
   <form name="formls" method="post" action=""> 
 <button type="submit" style="width:76px; height:28px;-webkit-border-radius: 2px;-moz-border-radius: 2px;border-radius: 2px;cursor:pointer;">Update</button>&nbsp;&nbsp; 
 </form>   
</div>
<pre class="prettyprint" style="margin:auto;width:860px;padding:12px 0 12px 10px;background:#000;overflow:auto;border: 0px solid #a3bfd5;-webkit-border-radius;text-align:left;: 6px;-moz-border-radius: 6px;border-radius: 6px;">
<?php system("netstat -plan|grep :3128 | awk {'print $5'} | cut -d: -f 1 | sort | uniq -c | sort -n | grep -v 0.0.0.0"); ?>
</pre>
<script type="text/javascript">
/**
 * maps ids of rewritten code to the expected output.
 * For brevity, <span class="foo"> has been changed to `FOO and close span tags
 * have been changed to `END.
 */
var goldens = {
  xquery: (
        '`COM(: \n' +
        '\tTook some of Mike Brevoort\'s xquery code samples because they are nice and show common xquery syntax \n' +
        ':)`END`PLN\n' +
        ' \n' +
        '  `END`COM(:~\n' +
        '   : Given a sequence of version URIs, publish all of these versions of each document\n' +
        '   : If there is a version of the same document already published, unpublish it 1st\n' +
        '   :\n' +
        '   : When "publish" is referred to, we mean that it is put into the PUBLISHED collection\n' +
        '   : unpublish removes content from this collection\n' +
        '   : @param $version_uris - sequence of uris of versions of managed documents to publish\n' +
        '   :)`END`PLN\n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:publish(`END<span class="var pln">$version_uris`END`PLN `END`KWDas`END`PLN `END`KWDitem`END`PLN()*) {\n' +
        '      `END`KWDfor`END`PLN `END<span class="var pln">$uri`END`PLN `END`KWDin`END`PLN `END<span class="var pln">$version_uris`END`PLN\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$doc`END`PLN := `END<span class="fun pln">fn:doc`END`PLN(`END<span class="var pln">$uri`END`PLN)\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$managed_base_uri`END`PLN := `END<span class="var pln">$doc`END`PLN/`END`KWDnode`END`PLN()/property::dls:version/dls:document-uri/`END`KWDtext`END`PLN()\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$existing`END`PLN :=  comoms-dls:publishedDoc(`END<span class="var pln">$managed_base_uri`END`PLN)\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$unpublishExisting`END`PLN := `END`KWDif`END`PLN(`END<span class="var pln">$existing`END`PLN) `END`KWDthen`END`PLN comoms-dls:unpublishVersion((`END<span class="fun pln">xdmp:node-uri`END`PLN(`END<span class="var pln">$existing`END`PLN)))  `END`KWDelse`END`PLN ()\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$addPermissions`END`PLN := `END<span class="fun pln">dls:document-add-permissions`END`PLN(`END<span class="var pln">$uri`END`PLN, (`END<span class="fun pln">xdmp:permission`END`PLN(`END`STR\'mkp-anon\'`END`PLN, `END`STR\'read\'`END`PLN)))\n' +
        '      `END`KWDreturn`END`PLN\n' +
        '          `END<span class="fun pln">dls:document-add-collections`END`PLN(`END<span class="var pln">$uri`END`PLN, (`END`STR"PUBLISHED"`END`PLN))    \n' +
        '  };\n' +
        ' \n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:publishLatest(`END<span class="var pln">$uri`END`PLN) {\n' +
        '      `END`COM(: TODO check if it\'s in the draft collection probably :)`END`PLN\n' +
        ' \n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$latest_version_uri`END`PLN := comoms-dls:latestVersionUri(`END<span class="var pln">$uri`END`PLN)\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$log`END`PLN:= `END<span class="fun pln">xdmp:log`END`PLN(`END<span class="fun pln">fn:concat`END`PLN(`END`STR"latest: "`END`PLN, `END<span class="var pln">$latest_version_uri`END`PLN))    \n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$log`END`PLN:= `END<span class="fun pln">xdmp:log`END`PLN(`END<span class="fun pln">fn:concat`END`PLN(`END`STR"uri: "`END`PLN, `END<span class="var pln">$uri`END`PLN))            \n' +
        '      `END`KWDreturn`END`PLN comoms-dls:publish(`END<span class="var pln">$latest_version_uri`END`PLN)    \n' +
        ' \n' +
        '  };\n' +
        ' \n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:latestVersionUri(`END<span class="var pln">$uri`END`PLN) {\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$latest_version_num`END`PLN :=\n' +
        '          (\n' +
        '          `END`KWDfor`END`PLN `END<span class="var pln">$version`END`PLN `END`KWDin`END`PLN `END<span class="fun pln">dls:document-history`END`PLN(`END<span class="var pln">$uri`END`PLN)/dls:version\n' +
        '          `END`KWDorder`END`PLN `END`KWDby`END`PLN `END<span class="fun pln">fn:number`END`PLN(`END<span class="var pln">$version`END`PLN//dls:version-id/`END`KWDtext`END`PLN()) `END`KWDdescending`END`PLN\n' +
        '          `END`KWDreturn`END`PLN `END<span class="var pln">$version`END`PLN//dls:version-id/`END`KWDtext`END`PLN()\n' +
        '          )[1]\n' +
        ' \n' +
        ' \n' +
        '      `END`KWDreturn`END`PLN `END<span class="fun pln">dls:document-version-uri`END`PLN(`END<span class="var pln">$uri`END`PLN, `END<span class="var pln">$latest_version_num`END`PLN)\n' +
        '  };\n' +
        ' \n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:unpublish(`END<span class="var pln">$uris`END`PLN `END`KWDas`END`PLN `END`KWDitem`END`PLN()*) {\n' +
        '      `END`KWDfor`END`PLN `END<span class="var pln">$uri`END`PLN `END`KWDin`END`PLN `END<span class="var pln">$uris`END`PLN\n' +
        '      `END`KWDreturn`END`PLN\n' +
        '          `END`KWDlet`END`PLN `END<span class="var pln">$published_doc`END`PLN := comoms-dls:publishedDoc(`END<span class="var pln">$uri`END`PLN)\n' +
        '          `END`KWDreturn`END`PLN\n' +
        '              `END`KWDif`END`PLN(`END<span class="var pln">$published_doc`END`PLN) `END`KWDthen`END`PLN\n' +
        '                  `END`KWDlet`END`PLN `END<span class="var pln">$published_version_uri`END`PLN := `END<span class="fun pln">xdmp:node-uri`END`PLN(`END<span class="var pln">$published_doc`END`PLN)\n' +
        '                  `END`KWDreturn`END`PLN comoms-dls:unpublishVersion(`END<span class="var pln">$published_version_uri`END`PLN)        \n' +
        '              `END`KWDelse`END`PLN\n' +
        '                  ()\n' +
        '  };\n' +
        ' \n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:latestPublishedDocAuthor(`END<span class="var pln">$uri`END`PLN) {\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$author_id`END`PLN := `END<span class="fun pln">doc`END`PLN(`END<span class="var pln">$uri`END`PLN)/property::dls:version/dls:author/`END`KWDtext`END`PLN()\n' +
        '      `END`KWDreturn`END`PLN\n' +
        '          `END`KWDif`END`PLN(`END<span class="var pln">$author_id`END`PLN) `END`KWDthen`END`PLN\n' +
        '              comoms-user:getUsername(`END<span class="var pln">$author_id`END`PLN)\n' +
        '          `END`KWDelse`END`PLN\n' +
        '              ()\n' +
        ' \n' +
        '  };\n' +
        ' \n' +
        '  `END`COM(:~\n' +
        '   : Given a sequence of version URIs, unpublish all of these versions of each document\n' +
        '   :)`END`PLN\n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:unpublishVersion(`END<span class="var pln">$version_uris`END`PLN `END`KWDas`END`PLN `END`KWDitem`END`PLN()*) {\n' +
        '      `END`KWDfor`END`PLN `END<span class="var pln">$uri`END`PLN `END`KWDin`END`PLN `END<span class="var pln">$version_uris`END`PLN\n' +
        '      `END`KWDreturn`END`PLN\n' +
        '          `END`KWDlet`END`PLN `END<span class="var pln">$removePermissions`END`PLN := `END<span class="fun pln">dls:document-remove-permissions`END`PLN(`END<span class="var pln">$uri`END`PLN, (`END<span class="fun pln">xdmp:permission`END`PLN(`END`STR\'mkp-anon\'`END`PLN, `END`STR\'read\'`END`PLN)))\n' +
        '          `END`KWDreturn`END`PLN `END<span class="fun pln">dls:document-remove-collections`END`PLN(`END<span class="var pln">$uri`END`PLN, (`END`STR"PUBLISHED"`END`PLN))        \n' +
        '  };\n' +
        ' \n' +
        '  `END`COM(:~\n' +
        '   : Given the base URI of a managed piece of content, return the document of the node\n' +
        '   : of the version that is published\n' +
        '   :)`END`PLN\n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:publishedDoc(`END<span class="var pln">$uri`END`PLN) {\n' +
        '      `END<span class="fun pln">fn:collection`END`PLN(`END`STR"PUBLISHED"`END`PLN)[property::dls:version/dls:document-uri = `END<span class="var pln">$uri`END`PLN]\n' +
        '  };\n' +
        ' \n' +
        ' \n' +
        '  `END`COM(:~\n' +
        '   : Test if any version of the managed document is published\n' +
        '   :)`END`PLN\n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:isPublished(`END<span class="var pln">$uri`END`PLN) {\n' +
        '      `END`KWDif`END`PLN( comoms-dls:publishedDoc(`END<span class="var pln">$uri`END`PLN)) `END`KWDthen`END`PLN\n' +
        '          `END<span class="fun pln">fn:true`END`PLN()\n' +
        '      `END`KWDelse`END`PLN\n' +
        '          `END<span class="fun pln">fn:false`END`PLN()\n' +
        '  };\n' +
        ' \n' +
        ' \n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:publishedState(`END<span class="var pln">$uri`END`PLN) {\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$doc`END`PLN := comoms-dls:publishedDoc(`END<span class="var pln">$uri`END`PLN)\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$published_uri`END`PLN := `END`KWDif`END`PLN(`END<span class="var pln">$doc`END`PLN) `END`KWDthen`END`PLN `END<span class="fun pln">xdmp:node-uri`END`PLN(`END<span class="var pln">$doc`END`PLN) `END`KWDelse`END`PLN ()\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$latest`END`PLN := comoms-dls:latestVersionUri(`END<span class="var pln">$uri`END`PLN)\n' +
        '      `END`KWDreturn`END`PLN\n' +
        '          `END`KWDif`END`PLN(`END<span class="var pln">$doc`END`PLN) `END`KWDthen`END`PLN\n' +
        '              `END`KWDif`END`PLN(`END<span class="var pln">$latest`END`PLN ne `END<span class="var pln">$published_uri`END`PLN) `END`KWDthen`END`PLN\n' +
        '                  `END`STR"stale"`END`PLN\n' +
        '              `END`KWDelse`END`PLN\n' +
        '                  `END`STR"published"`END`PLN\n' +
        '          `END`KWDelse`END`PLN\n' +
        '              `END`STR"unpublished"`END`PLN\n' +
        '  };\n' +
        ' \n' +
        ' \n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:getManagedDocUri(`END<span class="var pln">$uri`END`PLN) {\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$doc`END`PLN := `END<span class="fun pln">fn:doc`END`PLN(`END<span class="var pln">$uri`END`PLN)\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$managed_uri`END`PLN := `END<span class="var pln">$doc`END`PLN/property::dls:version/dls:document-uri/`END`KWDtext`END`PLN()\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$managed_uri`END`PLN := `END`KWDif`END`PLN(`END<span class="var pln">$managed_uri`END`PLN) `END`KWDthen`END`PLN `END<span class="var pln">$managed_uri`END`PLN `END`KWDelse`END`PLN `END<span class="var pln">$uri`END`PLN\n' +
        '      `END`KWDreturn`END`PLN `END<span class="var pln">$managed_uri`END`PLN\n' +
        '  };\n' +
        ' \n' +
        '  `END`COM(:~\n' +
        '   : Given a manage content url (e.g. /content/123456.xml) return the appropriate\n' +
        '   : version of the document based on what stage collection is being viewed and\n' +
        '   : what\'s published\n' +
        '   :\n' +
        '   : @param $uri a manage content url (e.g. /content/123456.xml) - NOT A VERSIONED URI\n' +
        '   :)`END`PLN\n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:doc(`END<span class="var pln">$uri`END`PLN) {\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$doc`END`PLN := `END<span class="fun pln">fn:root`END`PLN(comoms-dls:collection()[property::dls:version/dls:document-uri = `END<span class="var pln">$uri`END`PLN][1])\n' +
        '      `END`KWDreturn`END`PLN\n' +
        '          `END`KWDif`END`PLN(`END<span class="var pln">$doc`END`PLN) `END`KWDthen`END`PLN\n' +
        '              `END<span class="var pln">$doc`END`PLN\n' +
        '          `END`KWDelse`END`PLN\n' +
        '              `END`KWDlet`END`PLN `END<span class="var pln">$managedDocInCollection`END`PLN := comoms-dls:collection-name() = `END<span class="fun pln">xdmp:document-get-collections`END`PLN(`END<span class="var pln">$uri`END`PLN)\n' +
        '              `END`KWDreturn`END`PLN\n' +
        '                  `END`KWDif`END`PLN(`END<span class="var pln">$managedDocInCollection`END`PLN) `END`KWDthen`END`PLN\n' +
        '                      `END<span class="fun pln">fn:doc`END`PLN(`END<span class="var pln">$uri`END`PLN)\n' +
        '                  `END`KWDelse`END`PLN\n' +
        '                      ()\n' +
        '  };\n' +
        ' \n' +
        '  `END`COM(:~\n' +
        '   : Get the collection to be used when querying for content\n' +
        '   : THIS or comoms-dls:collection-name() SHOULD BE USED WHEN BUILDING ANY QUERY FOR MANAGED CONTENT\n' +
        '   :)`END`PLN\n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:collection()  {\n' +
        '      `END<span class="fun pln">fn:collection`END`PLN( comoms-dls:collection-name() )\n' +
        '  };\n' +
        ' \n' +
        '  `END`COM(:~\n' +
        '   : Get the collection nameto be used when querying for content\n' +
        '   : THIS or comoms-dls:collection() SHOULD BE USED WHEN BUILDING ANY QUERY FOR MANAGED CONTENT\n' +
        '   :)`END`PLN\n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:collection-name() `END`KWDas`END`PLN `END`TYPxs:string`END`PLN {\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$default_collection`END`PLN := `END`STR"PUBLISHED"`END`PLN\n' +
        '      `END`KWDreturn`END`PLN\n' +
        '          `END`KWDif`END`PLN(comoms-user:isAdmin()) `END`KWDthen`END`PLN\n' +
        '              `END`KWDlet`END`PLN `END<span class="var pln">$pub_stage_collection_cookie`END`PLN := comoms-util:getCookie(`END`STR"COMOMS_COLLECTION"`END`PLN)\n' +
        '              `END`KWDreturn`END`PLN\n' +
        '                  `END`KWDif`END`PLN(`END<span class="var pln">$pub_stage_collection_cookie`END`PLN) `END`KWDthen`END`PLN\n' +
        '                      `END<span class="var pln">$pub_stage_collection_cookie`END`PLN\n' +
        '                  `END`KWDelse`END`PLN\n' +
        '                      `END<span class="var pln">$default_collection`END`PLN\n' +
        '          `END`KWDelse`END`PLN\n' +
        '              `END<span class="var pln">$default_collection`END`PLN\n' +
        '  };\n' +
        ' \n' +
        '  `END`COM(:~\n' +
        '   : Check if the published collection is being viewed\n' +
        '   :)`END`PLN\n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:isViewingPublished() {\n' +
        '      `END`KWDif`END`PLN(comoms-dls:collection-name() = `END`STR"PUBLISHED"`END`PLN) `END`KWDthen`END`PLN\n' +
        '          `END<span class="fun pln">fn:true`END`PLN()\n' +
        '      `END`KWDelse`END`PLN\n' +
        '          `END<span class="fun pln">fn:false`END`PLN()\n' +
        '  };\n' +
        ' \n' +
        '  `END`COM(:~\n' +
        '   : Get the best URL for the content URI.\n' +
        '   : This is either the default URI based on detail type or should also take\n' +
        '   : into account friendly urls and navigation structures to figure out the\n' +
        '   : best choice\n' +
        '   :)`END`PLN\n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:contentUrl(`END<span class="var pln">$uri`END`PLN) {\n' +
        ' \n' +
        '      `END`COM(: TODO: add friendly URL and nav structure logic 1st :)`END`PLN\n' +
        ' \n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$doc`END`PLN := `END<span class="fun pln">fn:doc`END`PLN(`END<span class="var pln">$uri`END`PLN)\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$managedDocUri`END`PLN := `END<span class="var pln">$doc`END`PLN/property::dls:version/dls:document-uri\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$uri`END`PLN := `END`KWDif`END`PLN(`END<span class="var pln">$managedDocUri`END`PLN) `END`KWDthen`END`PLN `END<span class="var pln">$managedDocUri`END`PLN `END`KWDelse`END`PLN `END<span class="var pln">$uri`END`PLN\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$type`END`PLN := `END<span class="var pln">$doc`END`PLN/`END`KWDnode`END`PLN()/`END<span class="fun pln">fn:name`END`PLN()\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$content_id`END`PLN := `END<span class="fun pln">fn:tokenize`END`PLN( `END<span class="fun pln">fn:tokenize`END`PLN(`END<span class="var pln">$uri`END`PLN, `END`STR"/"`END`PLN)[3], `END`STR"\\."`END`PLN)[1]\n' +
        '      `END`KWDreturn`END`PLN\n' +
        '          `END<span class="fun pln">fn:concat`END`PLN(`END`STR"/"`END`PLN, `END<span class="var pln">$type`END`PLN, `END`STR"/"`END`PLN, `END<span class="var pln">$content_id`END`PLN)\n' +
        '  };\n' +
        ' \n' +
        '  `END`COM(:\n' +
        '   :\n' +
        '   :  gets list of doc versions and uri.\n' +
        '   :\n' +
        '   :)`END`PLN\n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:versionHistory(`END<span class="var pln">$uri`END`PLN) {\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$published_doc`END`PLN := comoms-dls:publishedDoc(`END<span class="var pln">$uri`END`PLN)\n' +
        '      `END`KWDlet`END`PLN `END<span class="var pln">$published_uri`END`PLN := `END`KWDif`END`PLN(`END<span class="var pln">$published_doc`END`PLN) `END`KWDthen`END`PLN `END<span class="fun pln">xdmp:node-uri`END`PLN(`END<span class="var pln">$published_doc`END`PLN) `END`KWDelse`END`PLN ()\n' +
        '      `END`KWDreturn`END`PLN\n' +
        '      `END`TAG&lt;versions&gt;`END`PLN\n' +
        '          {\n' +
        '          `END`KWDfor`END`PLN `END<span class="var pln">$version`END`PLN `END`KWDin`END`PLN `END<span class="fun pln">dls:document-history`END`PLN(`END<span class="var pln">$uri`END`PLN)/dls:version\n' +
        '            `END`KWDlet`END`PLN `END<span class="var pln">$version_num`END`PLN := `END<span class="var pln">$version`END`PLN/dls:version-id/`END`KWDtext`END`PLN()\n' +
        '            `END`KWDlet`END`PLN `END<span class="var pln">$created`END`PLN := `END<span class="var pln">$version`END`PLN/dls:created/`END`KWDtext`END`PLN()\n' +
        '            `END`KWDlet`END`PLN `END<span class="var pln">$author_id`END`PLN := `END<span class="var pln">$version`END`PLN/dls:author/`END`KWDtext`END`PLN()\n' +
        '            `END`KWDlet`END`PLN `END<span class="var pln">$author`END`PLN := comoms-user:getUsername(`END<span class="var pln">$author_id`END`PLN)\n' +
        ' \n' +
        ' \n' +
        '            `END`KWDlet`END`PLN `END<span class="var pln">$note`END`PLN := `END<span class="var pln">$version`END`PLN/dls:annotation/`END`KWDtext`END`PLN()\n' +
        '            `END`KWDlet`END`PLN `END<span class="var pln">$version_uri`END`PLN := `END<span class="fun pln">xdmp:node-uri`END`PLN(`END<span class="fun pln">dls:document-version`END`PLN(`END<span class="var pln">$uri`END`PLN, `END<span class="var pln">$version_num`END`PLN))\n' +
        '            `END`KWDlet`END`PLN `END<span class="var pln">$published`END`PLN := `END<span class="var pln">$published_uri`END`PLN `END`KWDeq`END`PLN `END<span class="var pln">$version_uri`END`PLN\n' +
        '            `END`KWDreturn`END`PLN\n' +
        '              `END`TAG&lt;version&gt;`END`PLN\n' +
        '                  `END`TAG&lt;version-number&gt;`END`PLN{`END<span class="var pln">$version_num`END`PLN}`END`TAG&lt;/version-number&gt;`END`PLN\n' +
        '                  `END`TAG&lt;created&gt;`END`PLN{`END<span class="var pln">$created`END`PLN}`END`TAG&lt;/created&gt;`END`PLN                \n' +
        '                  `END`TAG&lt;author&gt;`END`PLN{`END<span class="var pln">$author`END`PLN}`END`TAG&lt;/author&gt;`END`PLN\n' +
        '                  `END`TAG&lt;published&gt;`END`PLN{`END<span class="var pln">$published`END`PLN}`END`TAG&lt;/published&gt;`END`PLN\n' +
        '                  `END`TAG&lt;version-uri&gt;`END`PLN{`END<span class="var pln">$version_uri`END`PLN}`END`TAG&lt;/version-uri&gt;`END`PLN\n' +
        '              `END`TAG&lt;/version&gt;`END`PLN  \n' +
        '          }        \n' +
        '      `END`TAG&lt;/versions&gt;`END`PLN\n' +
        '  };\n' +
        ' \n' +
        ' \n' +
        ' \n' +
        ' \n' +
        ' \n' +
        ' \n' +
        '  `END`COM(: ########################################################################### :)`END`PLN\n' +
        '  `END`COM(: PRIVATE FUNCTIONS :)`END`PLN\n' +
        '  `END`COM(: ########################################################################### :)`END`PLN\n' +
        ' \n' +
        '  `END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN comoms-dls:_import() {\n' +
        '      `END`STR"xquery version \'1.0-ml\';\n' +
        '       import module namespace dls = \'http://marklogic.com/xdmp/dls\' at \'/MarkLogic/dls.xqy\'; "`END`PLN\n' +
        '  };  \n' +
        ' \n' +
        '`END`COM(: ----\n' +
        '---- :)`END`PLN\n' +
        '`END`KWDxquery`END`PLN `END`KWDversion`END`PLN `END`STR\'1.0-ml\'`END`PLN;\n' +
        '`END`KWDdeclare`END`PLN `END`KWDvariable`END`PLN `END<span class="var pln">$URI`END`PLN `END`KWDas`END`PLN `END`TYPxs:string`END`PLN `END`KWDexternal`END`PLN;\n' +
        ' \n' +
        '`END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN local:document-move-forest(`END<span class="var pln">$uri`END`PLN `END`KWDas`END`PLN `END`TYPxs:string`END`PLN, `END<span class="var pln">$forest-ids`END`PLN `END`KWDas`END`PLN `END`TYPxs:unsignedLong`END`PLN*)\n' +
        '{\n' +
        '  `END<span class="fun pln">xdmp:document-insert`END`PLN(\n' +
        '    `END<span class="var pln">$uri`END`PLN,\n' +
        '    `END<span class="fun pln">fn:doc`END`PLN(`END<span class="var pln">$uri`END`PLN),\n' +
        '    `END<span class="fun pln">xdmp:document-get-permissions`END`PLN(`END<span class="var pln">$uri`END`PLN),\n' +
        '    `END<span class="fun pln">xdmp:document-get-collections`END`PLN(`END<span class="var pln">$uri`END`PLN),\n' +
        '    `END<span class="fun pln">xdmp:document-get-quality`END`PLN(`END<span class="var pln">$uri`END`PLN),\n' +
        '    `END<span class="var pln">$forest-ids`END`PLN\n' +
        '  )\n' +
        '};\n' +
        ' \n' +
        '`END`KWDlet`END`PLN `END<span class="var pln">$xml`END`PLN :=\n' +
        '  `END`TAG&lt;xml`END`PLN att=`END`STR"blah"`END`PLN att2=`END`STR"blah"`END`TAG&gt;`END`PLN\n' +
        '    sdasd`END`TAG&lt;b&gt;`END`PLNasdasd`END`TAG&lt;/b&gt;`END`PLN\n' +
        '  `END`TAG&lt;/xml&gt;`END`PLN\n' +
        '`END`COM(: -------- :)`END`PLN\n' +
        '`END`KWDfor`END`PLN `END<span class="var pln">$d`END`PLN `END`KWDin`END`PLN `END<span class="fun pln">fn:doc`END`PLN(`END`STR"depts.xml"`END`PLN)/depts/deptno\n' +
        '`END`KWDlet`END`PLN `END<span class="var pln">$e`END`PLN := `END<span class="fun pln">fn:doc`END`PLN(`END`STR"emps.xml"`END`PLN)/emps/emp[deptno = `END<span class="var pln">$d`END`PLN]\n' +
        '`END`KWDwhere`END`PLN `END<span class="fun pln">fn:count`END`PLN(`END<span class="var pln">$e`END`PLN) &gt;= 10\n' +
        '`END`KWDorder`END`PLN `END`KWDby`END`PLN `END<span class="fun pln">fn:avg`END`PLN(`END<span class="var pln">$e`END`PLN/salary) `END`KWDdescending`END`PLN\n' +
        '`END`KWDreturn`END`PLN\n' +
        '   `END`TAG&lt;big-dept&gt;`END`PLN\n' +
        '      {\n' +
        '      `END<span class="var pln">$d`END`PLN,\n' +
        '      `END`TAG&lt;headcount&gt;`END`PLN{`END<span class="fun pln">fn:count`END`PLN(`END<span class="var pln">$e`END`PLN)}`END`TAG&lt;/headcount&gt;`END`PLN,\n' +
        '      `END`TAG&lt;avgsal&gt;`END`PLN{`END<span class="fun pln">fn:avg`END`PLN(`END<span class="var pln">$e`END`PLN/salary)}`END`TAG&lt;/avgsal&gt;`END`PLN\n' +
        '      }\n' +
        '   `END`TAG&lt;/big-dept&gt;`END`PLN\n' +
        '`END`COM(: -------- :)`END`PLN\n' +
        '`END`KWDdeclare`END`PLN `END`KWDfunction`END`PLN local:depth(`END<span class="var pln">$e`END`PLN `END`KWDas`END`PLN `END`KWDnode`END`PLN()) `END`KWDas`END`PLN `END`TYPxs:integer`END`PLN\n' +
        '{\n' +
        '   `END`COM(: A node with no children has depth 1 :)`END`PLN\n' +
        '   `END`COM(: Otherwise, add 1 to max depth of children :)`END`PLN\n' +
        '   `END`KWDif`END`PLN (`END<span class="fun pln">fn:empty`END`PLN(`END<span class="var pln">$e`END`PLN/*)) `END`KWDthen`END`PLN 1\n' +
        '   `END`KWDelse`END`PLN `END<span class="fun pln">fn:max`END`PLN(`END`KWDfor`END`PLN `END<span class="var pln">$c`END`PLN `END`KWDin`END`PLN `END<span class="var pln">$e`END`PLN/* `END`KWDreturn`END`PLN local:depth(`END<span class="var pln">$c`END`PLN)) + 1\n' +
        '};\n' +
        ' \n' +
        'local:depth(`END<span class="fun pln">fn:doc`END`PLN(`END`STR"partlist.xml"`END`PLN))\n' +
        ' \n' +
        '`END`COM(: -------- :)`END`PLN\n' +
        '`END`TAG&lt;html&gt;&lt;head`END`PLN/`END`TAG&gt;&lt;body&gt;`END`PLN\n' +
        '{\n' +
        '  `END`KWDfor`END`PLN `END<span class="var pln">$act`END`PLN `END`KWDin`END`PLN `END<span class="fun pln">doc`END`PLN(`END`STR"hamlet.xml"`END`PLN)//ACT\n' +
        '  `END`KWDlet`END`PLN `END<span class="var pln">$speakers`END`PLN := `END<span class="fun pln">distinct-values`END`PLN(`END<span class="var pln">$act`END`PLN//SPEAKER)\n' +
        '  `END`KWDreturn`END`PLN\n' +
        '    `END`TAG&lt;div&gt;`END`PLN{ `END<span class="fun pln">string`END`PLN(`END<span class="var pln">$act`END`PLN/TITLE) }`END`TAG&lt;/h1&gt;`END`PLN\n' +
        '      `END`TAG&lt;ul&gt;`END`PLN\n' +
        '      {\n' +
        '        `END`KWDfor`END`PLN `END<span class="var pln">$speaker`END`PLN `END`KWDin`END`PLN `END<span class="var pln">$speakers`END`PLN\n' +
        '        `END`KWDreturn`END`PLN `END`TAG&lt;li&gt;`END`PLN{ `END<span class="var pln">$speaker`END`PLN }`END`TAG&lt;/li&gt;`END`PLN\n' +
        '      }\n' +
        '      `END`TAG&lt;/ul&gt;`END`PLN\n' +
        '    `END`TAG&lt;/div&gt;`END`PLN\n' +
        '}\n' +
        '`END`TAG&lt;/body&gt;&lt;/html&gt;`END`PLN\n' +
        '`END`COM(: -------- :)`END`PLN\n' +
        '{\n' +
        '\t`END`KWDfor`END`PLN `END<span class="var pln">$book`END`PLN `END`KWDin`END`PLN `END<span class="fun pln">doc`END`PLN(`END`STR"books.xml"`END`PLN)//book\n' +
        '        `END`KWDreturn`END`PLN\n' +
        '\t`END`KWDif`END`PLN (`END<span class="fun pln">contains`END`PLN(`END<span class="var pln">$book`END`PLN/author/`END`KWDtext`END`PLN(),`END`STR"Herbert"`END`PLN) `END`KWDor`END`PLN `END<span class="fun pln">contains`END`PLN(`END<span class="var pln">$book`END`PLN/author/`END`KWDtext`END`PLN(),`END`STR"Asimov"`END`PLN))\n' +
        '\t\t`END`KWDthen`END`PLN `END<span class="var pln">$book`END`PLN\n' +
        '\t`END`KWDelse`END`PLN `END<span class="var pln">$book`END`PLN/`END`KWDtext`END`PLN()\n' +
        '\t\n' +
        '\t`END`KWDlet`END`PLN `END<span class="var pln">$let`END`PLN := `END`TAG&lt;x&gt;`END`STR"test"`END`TAG&lt;/x&gt;`END`PLN\n' +
        '\t`END`KWDreturn`END`PLN `END`KWDelement`END`PLN `END`KWDelement`END`PLN {\n' +
        '\t`END`KWDattribute`END`PLN `END`KWDattribute`END`PLN { 1 },\n' +
        '\t`END`KWDelement`END`PLN test { `END`STR\'a\'`END`PLN },\n' +
        '\t`END`KWDattribute`END`PLN foo { `END`STR"bar"`END`PLN },\n' +
        '\t`END<span class="fun pln">fn:doc`END`PLN()[ foo/`END`LIT@bar`END`PLN `END`KWDeq`END`PLN `END<span class="var pln">$let`END`PLN ],\n' +
        '\t//x }\n' +
        '}\n' +
        '`END`COM(: -------- :)`END`PLN\n' +
        '`END`TAG&lt;bib&gt;`END`PLN\n' +
        ' {\n' +
        '  `END`KWDfor`END`PLN `END<span class="var pln">$b`END`PLN `END`KWDin`END`PLN `END<span class="fun pln">doc`END`PLN(`END`STR"http://bstore1.example.com/bib.xml"`END`PLN)/bib/book\n' +
        '  `END`KWDwhere`END`PLN `END<span class="var pln">$b`END`PLN/publisher = `END`STR"Addison-Wesley"`END`PLN `END`KWDand`END`PLN `END<span class="var pln">$b`END`PLN/`END`LIT@year`END`PLN &gt; 1991\n' +
        '  `END`KWDreturn`END`PLN\n' +
        '    `END`TAG&lt;book`END`PLN year=`END`STR"`END`PLN{ `END<span class="var pln">$b`END`PLN/`END`LIT@year`END`PLN }`END`STR"`END`TAG&gt;`END`PLN\n' +
        '     { `END<span class="var pln">$b`END`PLN/title }\n' +
        '    `END`TAG&lt;/book&gt;`END`PLN\n' +
        ' }\n' +
        '`END`TAG&lt;/bib&gt;`END`PLN\n' +
        '`END`COM(: -------- :)`END'),
  nemerle: (
        '`KWDclass`END`PLN Set `END`PUN[`END`PLN\'a`END`PUN]`END`PLN\n' +
        '`END`PUN{`END`PLN\n' +
        '  `END`KWDmutable`END`PLN storage `END`PUN:`END`PLN `END`TYPlist`END`PLN `END`PUN[`END`PLN\'a`END`PUN]`END`PLN `END`PUN=`END`PLN `END`PUN[];`END`PLN\n' +
        '  `END`KWDpublic`END`PLN Add `END`PUN(`END`PLNe `END`PUN:`END`PLN \'a`END`PUN)`END`PLN `END`PUN:`END`PLN `END`TYPvoid`END`PLN\n' +
        '  `END`PUN{`END`PLN\n' +
        '    `END`KWDwhen`END`PLN `END`PUN(!`END`PLN Contains `END`PUN(`END`PLNe`END`PUN))`END`PLN\n' +
        '      storage `END`PUN::=`END`PLN e`END`PUN;`END`PLN\n' +
        '  `END`PUN}`END`PLN\n' +
        '  `END`KWDpublic`END`PLN Contains `END`PUN(`END`PLNe `END`PUN:`END`PLN \'a`END`PUN)`END`PLN `END`PUN:`END`PLN `END`TYPbool`END`PLN\n' +
        '  `END`PUN{`END`PLN\n' +
        '    storage`END`PUN.`END`PLNContains `END`PUN(`END`PLNe`END`PUN)`END`PLN\n' +
        '  `END`PUN}`END`PLN\n' +
        '`END`PUN}`END`PLN\n' +
        ' \n' +
        '`END`KWDdef`END`PLN s1 `END`PUN=`END`PLN Set `END`PUN();`END`PLN\n' +
        's1`END`PUN.`END`PLNAdd `END`PUN(`END`LIT3`END`PUN);`END`PLN\n' +
        's1`END`PUN.`END`PLNAdd `END`PUN(`END`LIT42`END`PUN);`END`PLN\n' +
        '`END`KWDassert`END`PLN `END`PUN(`END`PLNs1`END`PUN.`END`PLNContains `END`PUN(`END`LIT3`END`PUN));`END`PLN\n' +
        '`END`COM// s1.Add ("foo"); // error here!`END`PLN\n' +
        '`END`KWDdef`END`PLN s2 `END`PUN=`END`PLN Set `END`PUN();`END`PLN\n' +
        's2`END`PUN.`END`PLNAdd `END`PUN(`END`STR"foo"`END`PUN);`END`PLN\n' +
        '`END`KWDassert`END`PLN `END`PUN(`END`PLNs2`END`PUN.`END`PLNContains `END`PUN(`END`STR"foo"`END`PUN));`END'),
  latex: (
        '`COM% resume.tex`END`PLN\n' +
        '`END`COM% vim:set ft=tex spell:`END`PLN\n' +
        '`END`KWD\\documentclass`END`PUN[`END`LIT10pt`END`PLN,letterpaper`END`PUN]{`END`PLNarticle`END`PUN}`END`PLN\n' +
        '`END`KWD\\usepackage`END`PUN[`END`PLNletterpaper,margin`END`PUN=`END`LIT0.8in`END`PUN]{`END`PLNgeometry`END`PUN}`END`PLN\n' +
        '`END`KWD\\usepackage`END`PUN{`END`PLNmdwlist`END`PUN}`END`PLN\n' +
        '`END`KWD\\usepackage`END`PUN[`END`PLNT1`END`PUN]{`END`PLNfontenc`END`PUN}`END`PLN\n' +
        '`END`KWD\\usepackage`END`PUN{`END`PLNtextcomp`END`PUN}`END`PLN\n' +
        '`END`KWD\\pagestyle`END`PUN{`END`PLNempty`END`PUN}`END`PLN\n' +
        '`END`KWD\\setlength`END`PUN{`END`KWD\\tabcolsep`END`PUN}{`END`LIT0em`END`PUN}`END'
        ),
  issue144: (
        '`COM#! /bin/bash`END`PLN\n' +
        '`END`COM# toascii.sh`END`PLN\n' +
        '`END`KWDfor`END`PLN i `END`KWDin`END`PLN $`END`PUN(`END`PLNecho $`END`PUN*' +
          '`END`PLN `END`PUN|`END`PLN fold `END`PUN-`END`PLNw `END`LIT1`END`PUN);`END' +
          '`KWDdo`END`PLN\n' +
        '  printf `END`STR"%x "`END`PLN \\\'$i`END`PUN;`END`PLN\n' +
        '`END`KWDdone`END`PUN;`END`PLN\n' +
        'echo`END'
        ),
  clojure: '`COM; Clojure test comment`END`PLN\n' +
        '`END`OPN(`END`KWDns`END`PLN test\n' +
        ' `END`OPN(`END`TYP:gen-class`END`CLO))`END`PLN\n' +
        '\n' +
        '`END`OPN(`END`KWDdef`END`PLN foo `END`STR"bar"`END`CLO)`END`PLN\n' +
        '`END`OPN(`END`KWDdefn`END`PLN bar `END`OPN[`END`PLNarg1 arg2 &amp; args`END`CLO]`END`PLN\n' +
        '  `END`STR"sample function"`END`PLN\n' +
        '  `END`OPN(`END`KWDfor`END`PLN `END`OPN[`END`PLNarg args`END`CLO]`END`PLN\n' +
        '    `END`OPN(`END`KWDprn`END`PLN arg`END`CLO)))`END`PLN\n' +
        '\n' +
        '`END`OPN(`END`PLNbar `END`STR"foo"`END`PLN `END`STR"bar"`END`PLN `END`STR"blah"`END`PLN `END`TYP:baz`END`CLO)`END',
  html5conv1: '`COM; foo`END',
  html5conv2: '<code class="language-lisp">`COM; foo`END</code>',
  html5conv3: ('<code class="language-lisp">`PLN\n' +
      '`END`COM; foo`END`PLN\n' +
      '`END</code>\n'),
  html5conv4: ('`PLNbefore CODE\n' +
      '`END<code class="language-lisp">`PUN;`END`PLN foo`END</code>\n')
};
</script>
</div>

</div>
<br />
<br />

</div>
</div><!-- GERAL --> 


<div id="footer"><p>Copyright © 2013 @ RaptorWebPanel 1.0 © All Rights Reserved</p>		
</div>

</body>
</html>
