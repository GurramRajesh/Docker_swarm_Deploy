<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Sortable - Handle empty lists</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  #sortable1, #sortable2, #sortable3 { list-style-type: none; margin: 0; float: left; margin-right: 10px; background: #eee; padding: 5px; width: 143px;}
  #sortable1 li, #sortable2 li, #sortable3 li { margin: 5px; padding: 5px; font-size: 1.2em; width: 120px; }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "ul.droptrue" ).sortable({
      connectWith: "ul"
    });
 
    $( "ul.dropfalse" ).sortable({
      connectWith: "ul",
      dropOnEmpty: false,
      update: function( event, ui ) {
        if (this === ui.item.parent()[0]){
      var liId = ui.item.attr("id");
      var liIndex = ui.item.index();
      var ulIndex = $(this).index();
      alert("li " +liIndex);
      alert("ul "+ulIndex);
      alert("liId " + liId);
      }
      }
      
    });
 
    $( "#sortable1, #sortable2, #sortable3" ).disableSelection();
  } );
  </script>
</head>
<body>
<div>
 
<ul id="sortable1" class="dropfalse">
  <li id="1" class="ui-state-default">Can be dropped..</li>
  <li class="ui-state-default">..on an empty list</li>
  <li class="ui-state-default">Item 3</li>
  <li class="ui-state-default">Item 4</li>
  <li class="ui-state-default">Item 5</li>
</ul>
 
<ul id="sortable2" class="dropfalse">
  <li class="ui-state-highlight">Cannot be dropped..</li>
  <li class="ui-state-highlight">..on an empty list</li>
  <li class="ui-state-highlight">Item 3</li>
  <li class="ui-state-highlight">Item 4</li>
  <li class="ui-state-highlight">Item 5</li>
</ul>
 
<ul id="sortable3" class="dropfalse">
 <li class="ui-state-highlight">Cannot be dropped..</li>
  <li class="ui-state-highlight">..on an empty list</li>
  <li class="ui-state-highlight">Item 3</li>
  <li class="ui-state-highlight">Item 4</li>
  <li class="ui-state-highlight">Item 5</li>
</ul>
 </div>
<br style="clear:both">
 
 
</body>
</html>