<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel PasteBin</title>
    <link rel="stylesheet" href="/css/codemirror.css">
    <script src="/js/codemirror.js"></script>
    <!-- extra tools -->
    <script src="/js/util/formatting.js"></script>
    <script src="/js/util/dialog.js"></script>
    <link rel="stylesheet" src="/js/util/dialog.css">
    <script src="/js/util/searchcursor.js"></script>
    <script src="/js/util/search.js"></script>
    <script src="/js/util/match-highlighter.js"></script>
    <script src="/js/util/closetag.js"></script>
    <!-- key bindings -->
    <script src="/js/util/keymap.vim.js"></script>
    <script src="/js/util/keymap.emacs.js"></script>
    <!-- load dependancy parsers -->
    <script src="/mode/clike/clike.js"></script>
    <script src="/mode/xml/xml.js"></script>
    <script src="/mode/javascript/javascript.js"></script>
    <script src="/mode/css/css.js"></script>
    <!-- technically optional  -->
	<script src="/mode/htmlmixed/htmlmixed.js"></script>

    <script src="/mode/php/php.js"></script>

    <style type="text/css">
	    body
		{
			background-color:#2F3030;
			margin:0;
			padding:0;
			font-family:sans-serif;
			color : #fff;
		}
		h1, h2, h3, h4, h5, h6 {
		  margin: 10px 0;
		  font-family: inherit;
		  font-weight: bold;
		  line-height: 20px;
		  color: inherit;
		  text-rendering: optimizelegibility;
		}
		h1 small,
		h2 small,
		h3 small,
		h4 small,
		h5 small,
		h6 small {
		  font-weight: normal;
		  line-height: 1;
		  color: #999999;
		}
		h1, h2, h3 { line-height: 40px; }
		h1 { font-size: 38.5px; }
		h2 { font-size: 31.5px; }
		h3 { font-size: 24.5px; }
		h4 { font-size: 17.5px; }
		h5 { font-size: 14px; }
		h6 { font-size: 11.9px; }
		h1 small { font-size: 24.5px; }
		h2 small { font-size: 17.5px; }
		h3 small { font-size: 14px; }
		h4 small { font-size: 14px; }

		dl { margin-left: 35px; font-size:.8em;}
		dl > dt { color:#777; font-weight:normal;}
		dl > dd { color:#959595; font-weight:normal;}


      .CodeMirror { border-bottom: 1px solid black;}
      /*.activeline {background: #e8f2ff !important;} #2F2F30*/
      	nav ul li a {
      		float: none;
			padding: 7px 11px 11px;
			line-height: 24px;
			color: #2F3030;
			text-decoration: none;
			font-family: "proxima-nova", sans-serif;
			font-weight: 700;
			font-size: 14px;
      	}
      	nav ul li a:hover {
			color: #fb503b;
			text-decoration: none;
		}
      	nav ul > li {

      		display: block;
			float: left;
			line-height: 18px;
			list-style: none;
			margin-bottom: 6px;
			text-align: -webkit-match-parent;
			text-transform: uppercase;
      	}
      	nav ul {
      		display: block;
      		
      		position:absolute;
      		margin-left:-133px;
      		left:50%;
      		top: 10px
      	}

		nav h1 a { 
	      	background: url(../img/laravel.png) no-repeat;
			display: block;
			text-indent: -90000px;
			height: 43px;
			width: 161px; 
		}
		nav h1 { height:62px; margin: 0; padding: 20px 0;}
		nav {
			padding: 0;
			margin:0;
      		background: #2F3030 url(/img/bg-head.png) repeat-x top left;
			height: 88px;
			position: relative;
	      	width:100%;
			padding-bottom: 10px;
		}

		#tool-cont { width:100%; height:20px; text-align: center; }
		#toolbar { margin-left:auto; margin-right:auto; width: 525px; display:block; } 
		#toolbar li { display:inline; float:right; }
		#toolbar li a, #toolbar li a:visited
		{
			display:inline-block;
			background-color:#444;
			color:#aaa;
			padding:0.2em 0.5em 0.2em 0.5em;
			text-decoration:none;
			text-transform:uppercase;
			font-size:0.8em;
			font-weight:bold;
		}

		#toolbar li a:hover
		{
			background-color:#EB4D09;
			color:#fff;
			text-shadow:0 1px 1px #75360C;
		}

		#toolbar li:first-child a
		{
			border-radius:0 3px 3px 0;
		}

		#toolbar li:last-child a
		{
			border-radius:3px 0 0 3px;
			border-right:1px solid #3d3d3d;
		}


    </style>
  </head>
  <body>
  	<script type="text/javascript">
		function createPaste() {
			$("#paster").submit();
		}
		

	</script>
  	    <nav>
  	    	<h1><a href="http://laravel.com">Laravel</a></h1>
  	    	<ul>
  	    		<li><a href="/">New</a></li>
  	    		<li><a href="javascript: createPaste()" id="save">{{ $save }}</a></li>
  	    		<li><a href="http://laravel.com/api/">API Docs</a></li>
  	    	</ul>
  	    </nav>
  	    <div id="tool-cont">
  	    	<section id="toolbar">
	  	    	<ul>
	  	    		@if ( $save == 'Save As' )
					<li><a href="/{{ $id }}/raw">View Raw</a></li>
					@endif
	  	    		<li><a href="javascript: nextKey()" id="key">keys: default</a></li>
	  	    		<li><a href="javascript: nextMode()" id="syntax">mode: php</a></li>
	  	    		<li><a href="javascript: autoFormatSelection()">Format Selected</a></li>
	  	    		
	  	    	</ul>
	  	    </section>
	  	</div>

    {{ Form::open('/', 'POST', array('id' => 'paster')) }}
    	<textarea id="code" name="paste">{{ $content }}</textarea>
    {{ Form::close() }}

    <script>

    var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        lineNumbers: true,
        matchBrackets: true,
        mode: "application/x-httpd-php-open",
        indentUnit: 4,
        indentWithTabs: true,
        enterMode: "indent",
        tabMode: "shift",
        value: startingValue,
        extraKeys: {
				//"'>'": function(cm) { cm.closeTag(cm, '>'); },
				"'/'": function(cm) { cm.closeTag(cm, '/'); }
			},
        onCursorActivity: function() {
			editor.matchHighlight("CodeMirror-matchhighlight");
		}
      });


    if( document.getElementById("save").innerHTML == 'Save'){
		var startingValue = '';
		for (var i = 0; i < 8; i++) {
			startingValue += '\n';
		}
    	editor.setValue(startingValue);
    }
    
    CodeMirror.commands["selectAll"](editor);


    function getSelectedRange() {
		return { from: editor.getCursor(true), to: editor.getCursor(false) };
	}

	function autoFormatSelection() {
		var range = getSelectedRange();
		editor.autoFormatRange(range.from, range.to);
	}

	function commentSelection(isComment) {
		var range = getSelectedRange();
		editor.commentRange(isComment, range.from, range.to);
	}

	function changeMode(mode) {
		editor.setOption('mode', mode);
	}

	var syntaxes = [
	    	{ id: 'php',        mime :'application/x-httpd-php-open'},
	    	{ id: 'html/mixed', mime: 'text/html'},
	    	{ id: 'js',         mime: 'text/javascript'},
	    	{ id: 'mysql',      mime: 'text/x-mysql'},
	    	{ id: 'less',       mime: 'text/x-less'},
	    	{ id: 'css',        mime: 'text/css'}
    	];

	var currentMode = 0;
	function nextMode(){
		if(currentMode < (syntaxes.length-1) ) { currentMode++; } 
		else { currentMode = 0; }

		var nm = syntaxes[ currentMode ];
		changeMode(nm.mime);
		$('#syntax').html( "mode: "+nm.id );
	}

	var keys = [
		{ id: 'default', key: ''},
		{ id: 'vim',     key: ''},
		{ id: 'emacs',   key: ''}
	];
	currentKey = 0;
	function nextKey(){
		if(currentKey < (keys.length-1) ) { currentKey++; } 
		else { currentKey = 0; }

		var key = keys[ currentKey ];
		editor.setOption("keyMap", key.id);
		$('#key').html( "keys: "+key.id );
	}


	var hlLine = editor.setLineClass(0, "activeline");
	</script>
	{{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js') }}
	<p><div style="height:25px; width:100%;"></div>
		<dl>
			<dt>Ctrl-F / Cmd-F</dt><dd>Start searching</dd>
			<dt>Ctrl-G / Cmd-G</dt><dd>Find next</dd>
			<dt>Shift-Ctrl-G / Shift-Cmd-G</dt><dd>Find previous</dd>
			<dt>Shift-Ctrl-F / Cmd-Option-F</dt><dd>Replace</dd>
			<dt>Shift-Ctrl-R / Shift-Cmd-Option-F</dt><dd>Replace all</dd>
		</dl>
	</p>
     
		
    


  </body>
</html>