<?php 
$doc_root="D:/SERVER/htdocs/construction/";
//$doc_root="C:/xampp/htdocs/web/construction/";
$old_path =  ini_set("include_path",$doc_root);//ini_get('include_path'). PATH_SEPARATOR .
ini_set("include_path",ini_get('include_path'). $old_path);
include_once("config.php");
include_once("includes/header.php");
?>
<script src="<?php echo SITE_JS;?>lightbox-2.6.min.js"></script>
<script src="<?php echo SITE_JS;?>openClosePanels.js"></script>
<div class='content_field'>
	<div class='rounded'>
		<div class='rounded_header'>
			<h1>галерия 1<span class='open_close_arrow right'><i class="icon-angle-up"></i></span></h1>
		</div>
		<div class='rounded_content'>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<div class="image-row">
				<div class="image-set images_list">
					<a class="image_link" href="<?php echo SITE_IMG;?>Construction.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>Construction.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>about.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>about.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>backgr1.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>backgr1.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>backgr.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>backgr.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>background.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>background.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>Sirona-engineering2.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>Sirona-engineering2.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>under_construction_3.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>under_construction_3.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>yt.png" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>yt.png" alt="Plants: image 1 0f 4 thumb" />
					</a>
				</div>
			</div>				
		</div>
	</div>
	<div class='rounded'>
		<div class='rounded_header'>
			<h1>галерия 2<span class='open_close_arrow right'><i class="icon-angle-up"></i></span></h1>
		</div>
		<div class='rounded_content'>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<div class="image-row">
				<div class="image-set images_list">
					<a class="image_link" href="<?php echo SITE_IMG;?>Construction.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>Construction.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>about.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>about.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>backgr1.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>backgr1.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>backgr.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>backgr.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>background.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>background.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>Sirona-engineering2.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>Sirona-engineering2.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>under_construction_3.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>under_construction_3.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>yt.png" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>yt.png" alt="Plants: image 1 0f 4 thumb" />
					</a>
				</div>
			</div>				
		</div>
	</div>
	<div class='rounded'>
		<div class='rounded_header'>
			<h1>галерия 3<span class='open_close_arrow right'><i class="icon-angle-up"></i></span></h1>
		</div>
		<div class='rounded_content'>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<div class="image-row">
				<div class="image-set images_list">
					<a class="image_link" href="<?php echo SITE_IMG;?>Construction.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>Construction.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>about.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>about.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>backgr1.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>backgr1.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>backgr.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>backgr.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>background.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>background.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>Sirona-engineering2.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>Sirona-engineering2.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>under_construction_3.jpg" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>under_construction_3.jpg" alt="Plants: image 1 0f 4 thumb" />
					</a>
					<a class="image_link" href="<?php echo SITE_IMG;?>yt.png" data-lightbox="example-set" title="Click on the right side of the image to move forward.">
						<img class="gallery_image" src="<?php echo SITE_IMG;?>yt.png" alt="Plants: image 1 0f 4 thumb" />
					</a>
				</div>
			</div>				
		</div>
	</div>
</div>
<?php include_once("includes/footer.php");?>