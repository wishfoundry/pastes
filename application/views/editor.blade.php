<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Laravel PasteBin</title>
    <link rel="stylesheet" href="/css/codemirror.css">
    <link rel="stylesheet" href="/css/theme/laravel.css">
    <link rel="stylesheet" href="/css/theme/monokai.css">
    <link rel="stylesheet" href="/css/theme/neat.css">
    <link rel="stylesheet" href="/css/theme/elegant.css">
    <link rel="stylesheet" href="/css/theme/erlang-dark.css">
    <link rel="stylesheet" href="/css/theme/night.css">
    <link rel="stylesheet" href="/css/theme/monokai.css">
    <link rel="stylesheet" href="/css/theme/cobalt.css">
    <link rel="stylesheet" href="/css/theme/eclipse.css">
    <link rel="stylesheet" href="/css/theme/rubyblue.css">
    <link rel="stylesheet" href="/css/theme/lesser-dark.css">
    <link rel="stylesheet" href="/css/theme/xq-dark.css">
    <link rel="stylesheet" href="/css/theme/ambiance.css">
    <link rel="stylesheet" href="/css/theme/blackboard.css">
    <link rel="stylesheet" href="/css/theme/vibrant-ink.css">
    <link rel="stylesheet" href="/css/theme/solarized.css">
    <link rel="stylesheet" href="/css/theme/twilight.css">

    <script src="/js/codemirror.js"></script>
    <!-- extra tools -->
    <script src="/js/util/matchbrackets.js"></script>
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
    <script src="/mode/jinja2/jinja2.js"></script>
    <script src="/mode/coffeescript/coffeescript.js"></script>
    <script src="/mode/markdown/markdown.js"></script>

    <style type="text/css">
	    body
		{
			background-color:#272822;
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
	      	background: url('/img/laravel.png') no-repeat;
			display: block;
			text-indent: -90000px;
			height: 43px;
			width: 161px; 
		}
		nav h1 { height:62px; margin: 0; padding: 20px 0;}
		nav {
			padding: 0;
			margin:0;
			position: relative;
	      	width:100%;
			padding-bottom: 10px;
		}

		#tool-cont { width:100%; height:40px; text-align: center; margin-bottom: 6px;  }
		#toolbar { margin: 0 auto 10px auto; /*idth: 580px;*/ height:36px; display:table; }
		#toolbar li { display:inline; float:right; border-left:1px solid #2F3030;}
		#toolbar li a, 
		#toolbar li a:visited,
		#toolbar li select
		{
			display:inline-block;
			background-color:#444;
			color:#aaa;
			padding:0.2em 0.5em 0.2em 0.5em;
			text-decoration:none;
			text-transform:uppercase;
			font-size:0.8em;
			font-weight:bold;
			line-height: 1em;
		}

		#toolbar li a:hover
		{
			background-color:#EB4D09;
			color:#fff;
			text-shadow:0 1px 1px #75360C;
		}

		#toolbar li:first-child a
		{
			border-radius:0 4px 4px 0;
		}

		#toolbar li:last-child a
		{
			border-radius:4px 0 0 4px;
			border-right:1px solid #3d3d3d;
		}
		select {
		    padding:3px;
		    margin: 0;
		    border-radius: 0;

		    background: #f8f8f8;
		    background-color: #444;
		    color:#888;
		    border:none;
		    outline:none;
		    display: inline-block;
		    -webkit-appearance:none;
		    -moz-appearance:none;
		    appearance:none;
		    cursor:pointer;
		}
		select > option {}

		/* Targetting Webkit browsers only. FF will show the dropdown arrow with so much padding. */
		@media screen and (-webkit-min-device-pixel-ratio:0) {
		    select {padding-right:18px}
		}

		label.select {
			position:relative; 
			display:inline-block;
		}
		label.select:after {
			content:'<>';
			font:11px "Consolas", monospace;
			color:#aaa;
			-webkit-transform:rotate(90deg);
			-moz-transform:rotate(90deg);
			-ms-transform:rotate(90deg);
			transform:rotate(90deg);
			right:8px; top:2px;
			padding:0 0 2px;
			border-bottom:1px solid #ddd;
			position:absolute;
			pointer-events:none;
		}
		label.select:before {
			content:'';
			right:6px; top:0px;
			width:20px; height:20px;
			/*background:#f8f8f8;
			background-color: #222;*/
			position:absolute;
			pointer-events:none;
			display:block;
		}​


    </style>
  </head>
  <body>
  	<script type="text/javascript">
		function createPaste() {
			$("#paster").submit();
		}
	</script>
  	    <div id="tool-cont">
  	    	<a href="http://laravel.com/docs" style="top:0; right:0; position:absolute;margin:3px 20px"><img src="/img/laravel.png" width="75" height="17px"></a>
  	    	<section id="toolbar">
	  	    	<ul>

	  	    		<li><a href="javascript: createPaste()" id="save">{{ $save }}</a></li>
  	    			<li><a href="/">New</a></li>
	  	    		@if ( $save == 'Save As' )
					<li><a href="/{{ $id }}/raw">View Raw</a></li>
					@endif
                    <li><a href="javascript: nextKey()" id="key">keys: default</a></li>
                      <li>
                          <label class="select">
                              <select onchange="goToDoc()" id="doc-selector">
                                  <option value="http://laravel.com/docs" selected>Docs</option>
                                  <option value="http://laravel.com/docs/database/eloquent">Eloquent</option>
                                  <option value="http://laravel.com/api/source-class-Laravel.Database.Eloquent.Model.html#329">-has_many_and_belongs_to()</option>
                                  <option value="http://laravel.com/docs/routing">Routing</option>
                                  <option value="http://laravel.com/docs/controllers">Controllers</option>
                                  <option value="http://laravel.com/docs/loading">Autoloading</option>
                                  <option value="http://laravel.com/docs/input">Input</option>
                                  <option value="http://laravel.com/docs/validation">Validation</option>
                              </select>
                          </label>
                      </li>

	  	    		<li>
                          <label class="select">
                              <select onchange="toolCommand()" id="tool-selector">
                                  <option value="tools" selected>Tools</option>
                                  <option value="tools">(not implemented)</option>
                                  <option value="format">Format Selection</option>
                                  <option value="find">Find (ctl+F)</option>
                                  <option value="findnext">Find Next (ctl+G)</option>
                                  <option value="findprev">Find Prv (ctrl+shf+G)</option>
                                  <option value="replace">Replace (ctl+shf+F)</option>
                                  <option value="replaceall">Replace All (ctl+shf+R)</option>
                                  <option value="save">Save (ctl+S)</option>
                                  <option value="save">New (ctl+n)</option>
                              </select>
                          </label>​
                    </li>

                    <li>
                        <label class="select">
                            <select id="mode-selector">
                              <option value="application/x-httpd-php-open" selected>PHP </option>
                              <option value="text/html">HTML/MIXED</option>
                              <option value="text/javascript">JS</option>
                              <option value="text/x-mysql">MYSQL</option>
                              <option value="text/x-less">LESS</option>
                              <option value="text/css">CSS</option>
                              <option value="jinja2">TWIG</option>
                              <option value="text/x-coffeescript">COFFEE</option>
                              <option value="text/x-markdown">MARKDOWN</option>
                            </select>
                        </label>​
                    </li>
					<li>
                        <label class="select">
							<select onchange="selectTheme()" id="theme-selector" class="select" style="border-radius:4px 0 0 4px;">
							    <option selected>laravel</option>
							    <option>ambiance</option>
							    <option>blackboard</option>
							    <option>cobalt</option>
							    <option>eclipse</option>
							    <option>elegant</option>
							    <option>erlang-dark</option>
							    <option>lesser-dark</option>
							    <option>monokai</option>
							    <option>neat</option>
							    <option>night</option>
							    <option>rubyblue</option>
							    <option>solarized dark</option>
							    <option>solarized light</option>
							    <option>twilight</option>
							    <option>vibrant-ink</option>
							    <option>xq-dark</option>
							</select>
						</label>
					</li>
					
  	    			
	  	    		<!-- <li><a href="javascript: autoFormatSelection()">Format Selected</a></li> -->
	  	    		
	  	    		
	  	    	</ul>
	  	    </section>
	  	</div>

    {{ Form::open('/', 'POST', array('id' => 'paster')) }}
    	<textarea id="code" name="paste">{{ $content }}</textarea>
        <input id="doctype" type="hidden" name="doctype" value="{{ $doctype }}">
    {{ Form::close() }}

      <!-- <p><div style="height:25px; width:100%;"></div>
          <dl>
              <dt>Ctrl-S </dt><dd>Save</dd>
              <dt>Ctrl-N </dt><dd>New</dd>
              <dt>Ctrl-F / Cmd-F</dt><dd>Start searching</dd>
              <dt>Ctrl-G / Cmd-G</dt><dd>Find next</dd>
              <dt>Shift-Ctrl-G / Shift-Cmd-G</dt><dd>Find previous</dd>
              <dt>Shift-Ctrl-F / Cmd-Option-F</dt><dd>Replace</dd>
              <dt>Shift-Ctrl-R / Shift-Cmd-Option-F</dt><dd>Replace all</dd>
          </dl>
      </p> -->

    {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js') }}
    {{ HTML::script('/js/jquery.cookie.js') }}
    <script>

    var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        lineNumbers: true,
        lineWrapping: true,
        matchBrackets: true,
        mode: "application/x-httpd-php-open",
        theme: "laravel",
        indentUnit: 4,
        indentWithTabs: true,
        enterMode: "indent",
        tabMode: "shift",
        autoCloseTags: true,
        extraKeys: {
				//"'>'":    function(cm) { cm.closeTag(cm, '>');   },
				//"'/'":    function(cm) { cm.closeTag(cm, '/');   },
				"Ctrl-S": function() { $("#paster").submit(); },
				"Ctrl-N": function() { window.location = '/'; },
				"'":      function(editor) { wrapStr(editor, "'", "'");   },
				"'\"'":   function(editor) { wrapStr(editor, '\"', '\"'); },
				"[":      function(editor) { wrapStr(editor, "[", "]");   },
				"Tab": function(cm) { CodeMirror.commands[cm.getSelection().length ?  "indentMore" : "insertTab"](cm); }, 
				"Shift-Tab": "indentLess" 
			}
      });

    var hlLine = editor.addLineClass(0, "background", "activeline");

	editor.on("cursorActivity", function() {
		editor.matchHighlight("CodeMirror-matchhighlight");
		var cur = editor.getLineHandle(editor.getCursor().line);
		if (cur != hlLine) {
			editor.removeLineClass(hlLine, "background", "activeline");
			hlLine = editor.addLineClass(cur, "background", "activeline");
		}
	});



    function wrapStr(editor, str, str2) {
    		pos = editor.getCursor();
			editor.replaceSelection(str + str2);
			editor.setCursor({line: pos.line, ch: pos.ch + 1 });
	}


    if( document.getElementById("save").innerHTML == 'Save'){
		var startingValue = '';
		for (var i = 0; i < 49; i++) {
			startingValue += '\n';
		}
    	editor.setValue(startingValue);
    }
    
    //CodeMirror.commands["selectAll"](editor);


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

	function switchMode() {
        var select = document.getElementById('mode-selector')
        var mode = select.options[select.selectedIndex].value;
        if(mode == 'jinja2')
        {
            editor.setOption('mode', {name: 'jinja2', htmlMode: true});
        }
        else editor.setOption('mode', mode);
        document.getElementById('doctype').value = mode;
	}
	CodeMirror.on(document.getElementById('mode-selector'), 'change', switchMode);


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

    // Doc selector
    function goToDoc() {
        var input = document.getElementById("doc-selector");
        var url = input.options[input.selectedIndex].value;
        window.location = url;
    }


    // Tool selector
    function toolCommand() {}



	var themeinput = document.getElementById("theme-selector");

	function selectTheme() {
		var theme = themeinput.options[themeinput.selectedIndex].innerHTML;
		editor.setOption("theme", theme);
        $.cookie('laravel_theme', theme);
    }

//	var choice = document.location.search && decodeURIComponent(document.location.search.slice(1));
//	if (choice) {
//		themeinput.value = choice;
//		editor.setOption("theme", choice);
//	}

    // Set default theme
    if($.cookie('laravel_theme') == null)
    {
        $.cookie('laravel_theme', 'laravel');
    }
    else
    {
        var val = $.cookie('laravel_theme'), sel = document.getElementById('theme-selector');
        for(var i, j = 0; i = sel.options[j]; j++) {
            if(i.value == val) {
                sel.selectedIndex = j;
                break;
            }
        }
    }
    editor.setOption("theme", $.cookie('laravel_theme'));

    // Set default mode
    var val = document.getElementById('doctype').value
        , sel = document.getElementById('mode-selector');
    for(var i, j = 0; i = sel.options[j]; j++) {
        if(i.value == val) {
            sel.selectedIndex = j;
            break;
        }
    }
    switchMode()



	</script>


  </body>
</html>