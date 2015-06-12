{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}

<script src="/js/vendor/jquery-1.11.2.min.js"></script>

<!--
<script>
	window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.3.min.js"><\/script>')
</script>
-->

<script src="/js/bootstrap.min.js"></script>

<script src="/js/plugins.js"></script>

<script src="/js/main.js"></script>

		<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
		<script>
			tinymce.init({
				selector:'.editor',
				menubar: false,
				toolbar: 'bullist',
				numlist: true,
				skin_url: '/css/editor/light',
				valid_elements : "-ul/-ol,-li",
				setup : function(ed) {
					ed.on("click", function() {
						console.log(ed);
					});
				}
			});
			tinymce.init({
				selector:'.editorOrdered',
				menubar: false,
				toolbar: 'numlist',
				numlist: true,
				skin_url: '/css/editor/light'
			});
		</script>




<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63968805-1', 'auto');
  ga('send', 'pageview');

</script>