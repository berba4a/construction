<?php
class EntryManager
{
	private $pageclass;
	private $catID;
	function __construct($arr)
	{
		if(array_key_exists('pageclass',$arr)&&!empty($arr['pageclass']))
		{
			$this->pageclass = $arr['pageclass'];
			include_once(CLASSCORE."pages/".$this->pageclass.".php");
		}
		else
			exit("Invalid page class!");
	
		if(array_key_exists('catID',$arr)&&!empty($arr['catID'])&&$arr['catID']>0)
		{
			$this->catID = $arr['catID'];
			include_once(ADMIN_MODULES."classcore/data/CategoriesData.php");
		}
		else
			exit("Invalid category id!");
		
	}
	
	function countEntries()
	{
		$entry_basic_data = $this->getEntryTypeData();
		$count = $entry_basic_data->startIterator(" AND catID=".$this->catID."");
		return $count;
	}
	
	//get basic entry type data according the basic type of entry and return datatable object 
	function getEntryTypeData()
	{
		$page = new $this->pageclass(new CategoriesData());
		$categories = $page->getData();
		$cat_row = $categories->getByID($this->catID);
		if(NULL==$cat_row)
			exit("Category with this ID not exists");
			
		$cat_title = $cat_row['title'];
		//1-text,2-file
		$entrytypeID = $cat_row['entrytypeID'];
		switch($entrytypeID)
		{
			case TEXT_ENTRY:
			{
				include_once(ADMIN_MODULES."classcore/data/BasicEntryTextData.php");
				$page = new $this->pageclass(new BasicEntryTextData());
				$entry_data = $page->getData();
				break;
			}
			case FILE_ENTRY:
			{
				include_once(ADMIN_MODULES."classcore/data/BasicEntryFileData.php");
				$page = new $this->pageclass(new BasicEntryFileData());
				$entry_data = $page->getData();
				break;
			}
		}
		return $entry_data;
	}
	
	//get Entries characteristics data according the basic type of entry and return datatable object 
	function getEntryCharacteristicsData()
	{
		$basic_entry_data = $this->getEntryTypeData();//basic entry type data
		$basic_class_name = get_class($basic_entry_data);
		$entry_characteristics_classname = substr($basic_class_name,0,-4)."CharacteristicsData";
		//additional characteristics data class name
		include_once(ADMIN_MODULES."classcore/data/".$entry_characteristics_classname.".php");
		$page = new $this->pageclass(new $entry_characteristics_classname());
		$entry_charact_data = $page->getData();//entry characteristics data
		return $entry_charact_data;
	}
	
	//get all charateristics data and return datatable object 
	function getCharacteristicsData()
	{
		include_once(ADMIN_MODULES."classcore/data/CharacteristicsData.php");
		$page = new $this->pageclass(new CharacteristicsData());
		$charact_data = $page->getData();
		return $charact_data;
	}
	
	//get languages data and return datatable object 
	function getLangugagesData()
	{
		include_once(CLASSCORE."data/LanguagesData.php");
		$page = new $this->pageclass(new LanguagesData());
		$languages = $page->getData();//languages data
		return $languages;
	}
		
	function getCategoriesData()
	{
		include_once(ADMIN_MODULES."classcore/data/CategoriesData.php");
		$page = new $this->pageclass(new CategoriesData());
		$categories = $page->getData();
		return $categories;
	}
	
	//get characteristics childs data in an associative array with key characteristics id and value child table primary key name
	function getCharacteristicsChildsData()
	{
		$charact_data = $this->getCharacteristicsData();
		$lists_count = $charact_data->startIterator(" AND data_class IS NOT NULL");
		$charact_lists_ids = array();
		if($lists_count>0)
		{
			while($charact_data->fetchNext($entry_list_arr))
			{
				//get the list with all entries which are predefined into his own table into array with key-characteristic id and value=the primary key of his own table.
				include_once(ADMIN_MODULES."classcore/data/".$entry_list_arr['data_class'].".php");
				$entry_list_data = new $entry_list_arr['data_class'];
				$charact_lists_ids[$entry_list_arr['chID']] = $entry_list_data->getPrKey();
			}
		}
		return $charact_lists_ids;
	}
	
	//draw the whole entries list for selected category
	function drawEntriesList($order = false,$search_name = false)
	{
		//getting category name
		$categories = new CategoriesData();
		$cat_row = $categories->getByID($this->catID);
		$cat_title = $cat_row['title'];
		//getting lang name
		$languages = $this->getLangugagesData();
		
		$entry_data = $this->getEntryTypeData();
		$entry_prkey = $entry_data->getPrKey();
		if(isset($entry_data)&&!empty($entry_data)&&$entry_data != NULL)
		{
			$pr_key = $entry_data->getPrKey();
				echo "<div>";
					echo "<a class='btn btn-back right' href='".SITE_URL.SITE_ROOT."admin_modules/pages/entries_management/' >Go back</a>";
				echo "</div>";
				echo "<div class='clear'></div>";
				echo "<div class='content_header'>".$cat_title."</div>";
					echo "<div class='add_btn'>";//to edit style of the button
					
				//catID = 136 and 142 is member news ,here have to create the news and the newsletter.If te category id is changed ,the value in the if satement have to be changed.
				$display_button = true;
				if(CORPORATE_NEWS_ID == $this->catID||CORPORATE_RESPONSABILITY_ID == $this->catID)
				{
					if(CORPORATE_NEWS_ID == $this->catID)
						$news_type = 2;
					if(CORPORATE_RESPONSABILITY_ID == $this->catID)
						$news_type = 1;
					echo "<input type='button' class='btn btn-normal' onclick='manageEntry(4,".$this->catID.",".$news_type.")' value='Manage news' />&nbsp;&nbsp;&nbsp;";
					echo "<input type='button' class='btn btn-normal' onclick='manageEntry(5,".$this->catID.",".$news_type.")' value='Manage newsletters' />&nbsp;&nbsp;&nbsp;";
					//$btn_text = "Create new newsletter";
					$btn_text = "Publish newsletter";
					$display_button = false;
				}
				else
					$btn_text = "Add new entry";
				
			if($display_button)
			{
					echo "<input type='button' class='btn btn-normal' onclick='manageEntry(1,".$this->catID.")' value='".$btn_text."'/>";
				echo "</div>";//end add button div
				
				//form field for adding new entry
				//echo "<div id='form".$this->catID."' class='entry_form'></div>";//field for drow delete confirm field to move into the table
				echo "<table rowspan='0' colspan='0' border='0' width='100%'>";
					echo "<tr class='table_headers'>";
						echo "<td class='name_col' width='50%'>";
							echo "<a href='".$_SERVER['PHP_SELF']."?catID=".$this->catID."&display_title=asc'>";
								echo "<i class='arrow icon-down-open-1'></i>";
							echo "</a>";
								echo "&nbsp;Entry name&nbsp;";
							echo "<a href='".$_SERVER['PHP_SELF']."?catID=".$this->catID."&display_title=desc'>";
								echo "<i class='arrow icon-up-open-1'></i>";
							echo "</a>";
							echo "<form class='right' method='GET' enctype='multipart/form-data' action='".$_SERVER['PHP_SELF']."?catID=".$this->catID."'>";
								if(isset($_GET['search_name'])&&""!=trim($_GET['search_name']))
									$name_val = trim($_GET['search_name']);
								else 
									$name_val = "Search by name";
								echo "<input type='text' id='search_name' name='search_name' value='".$name_val."' onclick='clearInput();'/>";
								echo "<input type='hidden' name='catID' value='".$this->catID."' />";
								echo "<input type='submit' value='search' />";
							echo "</form>";
						echo "</td>";
						echo "<td align='center' width='12%'>";
							echo "<a href='".$_SERVER['PHP_SELF']."?catID=".$this->catID."&".$pr_key."=asc'>";
								echo "<i class='arrow icon-down-open-1 left'></i>";
							echo "</a>";
								echo "&nbsp;Entry id&nbsp;";
							echo "<a href='".$_SERVER['PHP_SELF']."?catID=".$this->catID."&".$pr_key."=desc'>";
								echo "<i class='arrow icon-up-open-1 right'></i>";
							echo "</a>";
						echo "</td>";
						echo "<td align='center' width='12%'>";
							echo "<a href='".$_SERVER['PHP_SELF']."?catID=".$this->catID."&langID=asc'>";
								echo "<i class='arrow icon-down-open-1 left'></i>";
							echo "</a>";
								echo "&nbsp;Language&nbsp;";
							echo "<a href='".$_SERVER['PHP_SELF']."?catID=".$this->catID."&langID=desc'>";
								echo "<i class='arrow icon-up-open-1 right'></i>";
							echo "</a>";
						echo "</td>";
						echo "<td align='center' width='20%'>";
							echo "Entry filename";
						echo "</td>";
						echo "<td align='center'>";
							echo "Entry management";
						echo "</td>";
					echo "</tr>";
			if(isset($_GET['p'])&&$_GET['p']>0)
				$p = $_GET['p'];
			else
				$p=1;		
			$ipp = 20;		
			$limit_num = ($p*$ipp)-$ipp;
			$limit_str = " LIMIT ".$limit_num.",".$ipp." ";
			
			/*Default order of the entries list*/
			$order_str = " ORDER BY ".$entry_prkey." DESC";
			
			if(false!=$order)
			{
				foreach($order as $by=>$direction)
				{
					$order_str =" ORDER BY ".$by." ".strtoupper($direction)." ";
				}
			}
			$name_filter = "";
			if(false!=$search_name)
			{
				$name_filter = " AND display_title LIKE '%".$search_name."%'";
			}
			//adustment to order
			
			
			$entries_num = $entry_data->startIterator(" AND catID=".$this->catID." ".$name_filter." ".$order_str." ".$limit_str." " );
			$all_entr_num = $entries_num;//needed for pagination
			if($entries_num>0)
			{
				while($entry_data->fetchNext($entries_arr))
				{
					if($entries_num%2==0)
						echo "<tr class='grey' id='entry_row_entryID".$entries_arr[$pr_key]."_catID".$this->catID."'>";
					else
						echo "<tr id='entry_row_entryID".$entries_arr[$pr_key]."_catID".$this->catID."'>";
					$entries_num--;
						echo "<td id='entryID".$entries_arr[$pr_key]."catID".$this->catID."'>";
							echo $entries_arr['display_title'];
						echo "</td>";
						echo "<td>";
							echo "<div class='table_right'>".$entries_arr[$pr_key]."</div>";
						echo "</td>";
						echo "<td>";
							$lang_row = $languages->getById($entries_arr['langID']);
							$lang_name = $lang_row['lang_name'];
							echo "<div class='table_right'>".$lang_name."</div>";
						echo "</td>";
						echo "<td>";
						
							//TODO display external link
							$file = "&nbsp;";
							$link="";
							$link_close="";
							if(array_key_exists('file_name',$entries_arr)&&""!=$entries_arr['file_name']&&NULL!=$entries_arr['file_name'])
							{
								if(strlen($entries_arr['file_name'])>30)
									$file = "...".substr($entries_arr['file_name'],-30);
								else
									$file = $entries_arr['file_name'];
								if(array_key_exists('file_name',$entries_arr)&&""!=$entries_arr['file_name'])
								{
									$link = "<a href='".SITE_ROOT.$entries_arr['dir_path'].$entries_arr['file_name']."' target='_blank'>";
									$link_close = "</a>";
								}
							}
							
							if(array_key_exists('external_link',$entries_arr)&&""!=$entries_arr['external_link']&&NULL!=$entries_arr['external_link'])
							{
								$file = "See the link here";
								$http="http://";
								$ext_link = $entries_arr['external_link'];
								if(strstr($ext_link,'http://')||strstr($ext_link,'https://'))
									//echo "pos".strpos($entries_arr['external_link'],'http://');
									$http = "";
									
									
							
								$link = "<a target='_blank' href='".$http.$entries_arr['external_link']."' class='file_link'>";
								$link_close = "</a>";
							}
							
							echo "<div class='table_right'>";
								echo $link;
									echo $file;
								echo $link_close;
							echo "</div>";
						echo "</td>";
						echo "<td>";
							echo "<div class='table_right'>";
								echo "<img src='".ADMIN_IMG."icons/edit.png' class='icon' onclick='manageEntry(2,".$this->catID.",-1,".$entries_arr[$pr_key].")' alt='edit' />";
								echo "&nbsp;&nbsp;&nbsp;<img src='".ADMIN_IMG."icons/del.png' onclick='manageEntry(3,".$this->catID.",-1,".$entries_arr[$pr_key].")' alt='delete' class='icon' />";
							echo "</div>";
						echo "</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td colspan='5'>";
							echo "<div id='form".$this->catID."entry".$entries_arr[$pr_key]."' class='entry_form'></div>";
						echo "</td>";
					echo "</tr>";
				}
			}
			else
			{
				echo "<tr>";
					echo "<td colspan='5'>";
						echo "No entries for this category";
					echo "</td>";
				echo "</tr>";
			}
				echo "<tr>";
					echo "<td  colspan='5'>";
						echo "<hr>";
						Utils::drawPagination($ipp,$p,$all_entr_num,4);
					echo "</td>";
				echo "</tr>";
			echo "</table>";
				echo "<div class='clear'></div>";
			echo "</div>";
			echo "<br /><br />";
			}
		}
		else
		{
			$_SESSION['err_msg'] = "Wrong entry type id passed";
			header("location:".$_SERVER['PHP_SELF']."");
		}		
	}
	
	
	//draws the form for upload/edit of entries
	function drawEntriesForm($action,$catID,$entryID=-1)
	{
		//basic entry data
		$entry_data = $this->getEntryTypeData();
		$entry_data_prKey = $entry_data->getPrKey();
		$entry_data_class = get_class($entry_data);
		$cut_name = substr($entry_data_class,0,-4);
		$cat_add_charateristics = $cut_name."CharacteristicsData";
		include_once(ADMIN_MODULES."classcore/data/".$cat_add_charateristics.".php");
		include_once(ADMIN_MODULES."classcore/data/CategoriesCharacteristicsData.php");
		include_once(CLASSCORE."data/LanguagesData.php");
		$categories = $this->getCategoriesData();
		$cat_data_arr = $categories->getById($this->catID);
		$cat_name = $cat_data_arr['title'];
		//languages data
		$languages = new LanguagesData();
				
		//category additional characteristics data
		$page = new $this->pageclass(new $cat_add_charateristics());
		$ca_add_ch_data = $page->getData();
		$title_value="";
		$langID = -1;
		$text = "";
		$external_link = "";
		if($entryID>0)
		{
			$entr_pr_key = $entry_data->getPrKey();
			$entry_cnt = $entry_data->startIterator(" AND ".$entr_pr_key." = ".$entryID." AND catID=".$this->catID."");
			if($entry_cnt>0)
			{
				$entry_data->fetchNext($entry_arr);
				$title_value = htmlspecialchars($entry_arr['display_title'],ENT_QUOTES);
				if(array_key_exists('text',$entry_arr)&&""!=$entry_arr['text'])
					$text = $entry_arr['text'];				
				$langID = $entry_arr['langID'];
				$header_text = ucfirst("Edit : ").ucfirst($title_value);
				if(array_key_exists('file_name',$entry_arr)&&""!=$entry_arr['file_name'])
					$file_name = $entry_arr['file_name'];
				if(array_key_exists('external_link',$entry_arr)&&""!=$entry_arr['external_link'])
					$external_link = $entry_arr['external_link'];
			}
			else
			{
				//$_SESSION['err_msg'] = "Wrong entry type id passed";
				header("location:".SITE_URL.SITE_ROOT."admin_modules/pages/entries_management/");
				//$header_text = "New entry for category: ".$cat_name;
			}
		}
		else
			$header_text = "New entry for category: ".$cat_name;
		echo "<div>";
			echo "<a class='btn btn-back right' href='".SITE_URL.SITE_ROOT."admin_modules/pages/entries_management/entries_list.php?catID=".$this->catID."'>Go back</a>";
		echo "</div>";
		echo "<div class='clear'></div>";
		echo "<div class='content_header'>".$header_text."</div>";
		echo "<div class='submit_form'>";
			echo "<form id='upload_form' method='POST' action='entries_management.php?submit=1' enctype='multipart/form-data'>";
				if(array_key_exists('err_msg',$_SESSION))
				{
					echo "<span class='red'>".$_SESSION['err_msg']."</span>";
					Session::clear('err_msg');//$_SESSION['err_msg'] = "";
				}
				echo "<label for='languages'>Choose language<span class='red'>*</span>:</label></br>";
				echo "<div id='lang_row'>";
					$add_char_data_class_arr = array("CategoriesAsFilterData","CategoriesAsFilterEntriesData");
					$languages->drawSimpleSelect("lang_name","".$langID."","id='languages'  onchange='filterByLang(this.id)'"," AND langID=1 OR langID=12","--");
				echo "</div><br />";
				echo "<div id='title_row'>Display title<span class='red'>*</span>:<br />";
					echo "<input type='text' name='display_title' id='display_title' value='".$title_value."' />";
					echo "<input type='hidden' name='entryID' value='".$entryID."' />";
				echo "</div><br /><br />";
				
		
		//display additional characteristics fields
		$cat_charact_data = new CategoriesCharacteristicsData();
		$join = "cc inner join characteristics ch on cc.chID=ch.chID";
		$cc_num = $cat_charact_data->startIterator(" AND catID=".$this->catID."","ch.chID,ch.chLabel,ch.title,ch.data_class,ch.is_date,ch.chDescr","".$join."");
		if($cc_num>0)
		{
			while($cat_charact_data->fetchNext($ca_ch_arr))
			{
				$chDescr = $ca_ch_arr['chDescr'];
				if($entryID>0)
				{					
					//get additional categories list and the values if they exists
					$cac_join = " betc inner join characteristics ch on betc.chID = ch.chID";
					$ca_add_ch_num = $ca_add_ch_data->startIterator(" AND ".$entry_data_prKey."=".$entryID." AND betc.chID=".$ca_ch_arr['chID']." ORDER BY ch.chID ASC","betc.value,betc.".$entry_data_prKey.",ch.title,ch.chID,ch.chDescr","".$cac_join."");
					
					//make array with values with key additional characteristic id 
					if($ca_add_ch_num>0)
					{
						if($ca_add_ch_num>1)
						{	
							while($ca_add_ch_data->fetchNext($cac_data_arr))
							{
								$value[$cac_data_arr['chID']][] =  $cac_data_arr['value'];//get array with values ang key characteristicID
							}
						}
						else
						{
							while($ca_add_ch_data->fetchNext($cac_data_arr))
							{
								$value[$cac_data_arr['chID']] =  $cac_data_arr['value'];//get array with values ang key characteristicID
							}
						}
					}
				}
				echo "<div id='add_ch".$ca_ch_arr['chID']."'>";
					echo "<label for='chID".$ca_ch_arr['chID']."'>".$ca_ch_arr['chLabel'].": </label><br />";
					
					$date_val = "";
					//checks if the selected field is date field
					if($ca_ch_arr['is_date']==1)
					{
						$css_class = "datepicker";
						$onclick_date = "onclick = \'getDate('chID".$ca_ch_arr['chID']."')\'";
						$id = "chID".$ca_ch_arr['chID']."";
						$date_val = date('d-m-Y',strtotime('now'));
					}
					else
					{
						$onclick_date="";
						$css_class = "";
						$id = "chID".$ca_ch_arr['chID']."";
					}	
					
					/*characteristic ID is short description ID ,to be changed if chID is changed make the field full width*/
					if(15==$ca_ch_arr['chID'])
						$css_class = "full_field";
						
					//checks if isset old value to edit
					if(!isset($value)||empty($value)||$value == NULL||!array_key_exists($ca_ch_arr['chID'],$value))
					{
						if($ca_ch_arr['data_class']!= NULL)
						{
							$data_class = array($ca_ch_arr['data_class']);
							$filter_ids_arr = array('chID'=>$ca_ch_arr['chID']);
							$this->drawAddFormFields($data_class,$filter_ids_arr);
						}
						else
						{
							echo "<input type='text' class='".$css_class."' ".$onclick_date." id='".$id."' name='chID".$ca_ch_arr['chID']."' value='".$date_val."' maxlength='1000' />";
							if(isset($chDescr)&&$chDescr != '')	
								echo "<div class='descr'>/".$chDescr."/</div>";
						}
					}
					else
					{
						if($ca_ch_arr['data_class']!= NULL)
						{	
							$data_class = array($ca_ch_arr['data_class']);
							$filter_ids_arr = array('def_val'=>$value[$ca_ch_arr['chID']],'chID'=>$ca_ch_arr['chID']);
							$this->drawAddFormFields($data_class,$filter_ids_arr);
						}
						else
						{
							echo "<input ".$onclick_date."' class='".$css_class."' type='text' id='".$ca_ch_arr['title']."' name='chID".$ca_ch_arr['chID']."' value='".htmlentities($value[$ca_ch_arr['chID']],ENT_QUOTES,'UTF-8')."' maxlength='1000' />";
							if(isset($chDescr)&&$chDescr != '')	
								echo "<div class='descr'>/".$chDescr."/</div>";
						}
					}
						
				echo "</div><br /><br />";
			}
		}
			$categories = new CategoriesData();
			$entry_data_by_id = $categories->getByID($catID);
			
			if($entry_data_by_id['entrytypeID'] == FILE_ENTRY)
			{
				$or = "";//change the frase from "Or external link" to "link"
				//quick solution hardcodded value for category links to be changed if category id is changed
				if($this->catID!=141)
				{
					echo "<label for='entry' id='entry_label'>Choose file : </label><br />";
					echo "<input type='file' name='entry' id='entry' class='file_input' onchange='disableUrlFileInputs(this.id,\"external_link\")' />";
					if($entryID>0)
						if(isset($file_name))
							echo "<span>Existing file: <span  class='green'>".$file_name."</span></span><br />";
					echo "<br />";
					$or="Or external";
				}
				echo "<label for='external_link' id='external_link_label'>".$or." link : </label><br />";
				echo "<input type='text' id='external_link' name='external_link' value ='".$external_link."' onblur='disableUrlFileInputs(this.id,\"entry\")' />";
			}
			
			//catID = 32 is "printed format" and catID = 136 is no needed text area.If te category id is changed ,the value in the if satement have to be changed.
			
			$jquery_submit = false;//will be used to keep the content of the textarea
			if(($entry_data_by_id['entrytypeID'] == TEXT_ENTRY&&$entry_data_by_id['catID']!=PRINTED_FORMAT_ID)&&($entry_data_by_id['entrytypeID'] == TEXT_ENTRY&&$entry_data_by_id['catID']!=CORPORATE_NEWS_ID))
			{
				echo "<label for='text'>Text:</label>";
				echo "<textarea class='wide' name='text' id='text' cols='60' rows='20'>".$text."</textarea>";
				$jquery_submit = true;
			}
				echo "<input type='hidden' name='catID' value = '".$catID."' />";
				/*if(!$jquery_submit)*/
					echo "<div><input type='submit' class='submit_button' value='Upload' /></div>";
			/*	else
					echo "jquery submit";*/
			echo "</form>";
		echo "</div>";//end main div for form
	}
	
	//$filter_ids_arr is array which contains the keys langID,selectedID if is in edit mode and all the additional ids which can be used as a filters
	function drawAddFormFields($dataclass_arr,$filter_ids_arr)
	{
		if(isset($dataclass_arr)&&!empty($dataclass_arr))
		{
			foreach($dataclass_arr as $key=>$dataclass_name)
			{
				include_once(ADMIN_MODULES."classcore/data/CharacteristicsData.php");
				include_once(ADMIN_MODULES."classcore/data/".$dataclass_name.".php");
				$cat_filter_data = new $dataclass_name();
				$cat_filter_prkey = $cat_filter_data->getPrKey();
				$ch_data = new CharacteristicsData();
				if(isset($filter_ids_arr)&&$filter_ids_arr!=null&&!empty($filter_ids_arr))
				{
					if(array_key_exists('def_val',$filter_ids_arr)&&$filter_ids_arr['def_val']>0)
						$def_val = $filter_ids_arr['def_val'];
					else
						$def_val = -1;
					
					$filter = "";
					if(array_key_exists('chID',$filter_ids_arr)&&$filter_ids_arr['chID']>0)
					{
						$chID = $filter_ids_arr['chID'];
						//$filter .= " AND catID=".$this->catID."";
					}
					else
						exit("Wrong characteristic ID");
						
				
					if(array_key_exists('langID',$filter_ids_arr)&&$filter_ids_arr['langID']>0)
						$filter .= " AND langID=".$filter_ids_arr['langID']."";
					
					$filter .= " AND 1=1 ORDER BY display_title ASC";
					
					$ch_arr=$ch_data->getByID($chID);
					$onchange="";
					$child_id=-1;
					$single_val = $ch_arr['is_single_val'];
					if(isset($ch_arr['child_class'])&&(NULL!=$ch_arr['child_class']||""!=$ch_arr['child_class']))
					{
						$ch_num = $ch_data->startIterator(" AND data_class='".$ch_arr['child_class']."' ");
						if($ch_num>0)
						{
							while($ch_data->fetchNext($child_charact_arr))
							{
								$child_id = $child_charact_arr['chID'];
							}
						}
						
						if($child_id>0)
							$onchange = " onchange='filterByParent(".$chID.",".$child_id.")' ";
					}		
					$edit_btn="";
					if(1==$ch_arr['is_editable'])
					{
						$query_arr = $_GET;
						$query_arr['chID'] = $chID;
						
						$edit_btn="&nbsp;&nbsp;<a href='".SITE_ROOT."admin_modules/pages/characteristic_management/manage_characteristic.php".Utils::queryString($query_arr)."'><img src='".ADMIN_IMG."icons/edit.png' class='edit_characteristic' /></a>";
					}
					//echo "<div class='filter_dropdowns' id='add_ch_div[".$chID."]'>";
					$select_id = "add_ch_list_".$chID."";
					$multiple="";
					echo "<div class='filter_dropdowns left' id='add_ch_div_".$chID."'>";
					if(1==$single_val)
					{
						$multiple = "multiple size='6'";
						$select_id.="[]";
						$cat_filter_num=$cat_filter_data->startIterator($filter);
						if($cat_filter_num>0)
						{
							echo "<select id='".$select_id."' ".$onchange." ".$multiple." name='".$cat_filter_prkey."[]'>";
							
							while($cat_filter_data->fetchNext($cat_filter_arr))
							{
								//check if is multiple selection of one characteristic for one entry
								$selected = "";
								if(!is_array($def_val))
								{
									if($def_val==$cat_filter_arr[$cat_filter_prkey])
										$selected = "selected";
								}
								else
								{
									if(in_array($cat_filter_arr[$cat_filter_prkey],$def_val))
										$selected = "selected";
								}
								echo "<option ".$selected." value='".$cat_filter_arr[$cat_filter_prkey]."'>".$cat_filter_arr['display_title']."</option>";
							}
							echo "</select>";
						}						
					}
					else
					{
						$cat_filter_data->drawSimpleSelect("display_title",$def_val," id='".$select_id."' ".$onchange." class='add_ch_dropdown' ".$multiple." ",$filter);
						
					}
					echo "</div>";
					echo $edit_btn;
					echo "<div class='clear'></div>";
				}
			}
		}
		else
		{
			exit("Wrong data class passed");
		}
	}
	
	function drawConfirmMessage($entryID)
	{
		$basic_entry_data = $this->getEntryTypeData();
		$entry_arr = $basic_entry_data->getByID($entryID);
		$entry_name = $entry_arr['display_title'];
		echo "<div class='delete_confirm' id='delete_confirm'>";
			echo "<div class='form_header'>Do you really want to delete:<br /><span class='bold'>".$entry_name."</span>?</div>";
			echo "<form id='catID".$this->catID."_entryID".$entryID."_delete_form'>";
				echo "<input type='hidden' name='entryID' value=".$entryID." />";
				echo "<input type='hidden' name='catID' value=".$this->catID." />";
				echo "<div class='conf_cancell_btns'>";
					echo "<a href='javascript:void(0);' onclick='deleteEntry(".$entryID.",".$this->catID.");' class='btn btn-dellink left''>Confirm</a>";
					echo "<a href='javascript:void(0);' onclick='cancellDel(".$entryID.",".$this->catID.");' class='btn btn-back right''>Cancel</a>";
					echo "<div class='clear'></div>";
				echo "</div>";
			echo "</form>";
		echo "</div>";
	}
	
	function deleteEntry($entryID)
	{
		$basic_entry_data = $this->getEntryTypeData();
		$entry_data_arr = $basic_entry_data->getById($entryID);
		if(array_key_exists('file_name',$entry_data_arr)&&""!=$entry_data_arr['file_name'])	
			$entry_file = DOC_ROOT.$entry_data_arr['dir_path'].$entry_data_arr['file_name'];
		if($entryID>0)
		{
			//include_once(LIB."dbdriver/dbFactory.php"); // comment by Nat
			$db = dbFactory::factory();
			$db->transaction();	
			$res = $basic_entry_data->deleteID($entryID, $db );
		}
		else
			exit("Invalid entry ID passed");

		//for tests - $db->rollback();	
		if($res>0)
		{
			$cat_data = $this->getCategoriesData();
			$cat_data_arr = $cat_data->getById($this->catID);
			$entrytypeID = $cat_data_arr['entrytypeID'];
			
			//chack if is linked file for this entry
			if($entrytypeID == FILE_ENTRY&&isset($entry_file)&&""!=$entry_file&&DOC_ROOT!=trim($entry_file))
			{
				/*$res2 = unlink($entry_file);
				if($res2)
				{
					$db->commit();
					echo "This entry vas deleted.";
				}
				else
				{
					$db->rollback();
					exit("The entry was no deleted ,try again later!");
				}*/
				//check if the file is linked with another category - prepared to delete entries linked to multiple categories DO NOT DELETE
				$esc_file_path = $db->escapeString($entry_data_arr['dir_path']);
				$esc_file_name =  $db->escapeString($entry_data_arr['file_name']);
				$file_num = $basic_entry_data->startIterator(" AND dir_path='".$esc_file_path."' AND file_name='".$esc_file_name."'");
				if($file_num>0)
				{
					//echo "The file ".$entry_data_arr['file_name']." is linked to another category, do you want to delete and another enties?";
					//echo "<a href='#' onclick='deleteEntry(".$entryID.",".$this->catID.");' class='btn btn-delete''>Confirm</a>";
					//$db->rollback();
					$db->commit();
					echo "This entry was deleted.<br />The file is not removed from file system<br />because is used by another entry<br />";
				}
				else
				{
					$res2 = @unlink($entry_file);
					if($res2)
					{
						$db->commit();
						echo "This entry was deleted";
					}
					else
					{ 
						$db->commit();
						echo "The entry was deleted !If the entry has files connected please remove them manually!";
					}
				}
			}
			else
			{
				$db->commit();
				echo "This entry vas deleted.";	
			}
		}
		else
		{	
			$db->rollback();
			echo $basic_entry_data->getError();
		}
	}
	
	//submitting entries form
	function submitForm($entryID=-1)
	{
		$page = new $this->pageclass();//page class
		$userID = $page->getUserID();//user id
		$basic_entry_data = $this->getEntryTypeData();//basic entry type data
		$entry_charact_data = $this->getEntryCharacteristicsData();//entry characteristics data
		$charact_data = $this->getCharacteristicsData();//get charateristics data
		$languages = $this->getLangugagesData();//languages data
		$categories = $this->getCategoriesData();//categories data
		$charact_lists_ids = $this->getCharacteristicsChildsData();//get all characteristics with his own datatable in an associative array with key charateristic id and value table primary key name
		//$charact_no_lists_ids = $this->getCharacteristicsNoChildsData();
		
		$cat_arr = $categories->getByID($this->catID);
		$record = array();
		$field_name = "entry";
		//get language id
		if(array_key_exists('langID',$_POST)&&$_POST['langID']>0)
		{
			$langID = $_POST['langID'];
			$lang_arr = $languages->getByID($langID);
			$lang_code = $lang_arr['lang_code'];
		}
		else
		{
			$err = "Language field is empty";
			Session::set('err_msg',$err."<br />"); $err."<br />";
			header("location:".$_SERVER['HTTP_REFERER']."");
			return;
		}
			
		if($cat_arr['entrytypeID'] == FILE_ENTRY)
		{
			if(isset($_FILES[$field_name]))
			{
				if($_FILES[$field_name]['error']!= UPLOAD_ERR_NO_FILE && $_FILES[$field_name]['size']
				>0 && is_array($_FILES[$field_name]))
				{
					//get categories name to create directories structure
					$cat_name_arr = $categories->Path4Node($this->catID);
					if(isset($cat_name_arr) && is_array($cat_name_arr))
					{
						$cat_name = "";
						$cat_name_dest="";
						foreach($cat_name_arr as $cID=>$c_name)
						{
							$last_el = end($cat_name_arr);
							if($c_name!="")
							{
								if($cat_name != "" && $last_el === $c_name)
								{
									$cat_name .= "catID".$cID.DIR_SEP;
									$cat_name_dest .= "catID".$cID.SEP;
								}
								else
								{
									$cat_name .= $c_name.DIR_SEP;
									$cat_name_dest .=$c_name.SEP;
								}
							}
						}
					}			
				
					//define restrictions for the file entries
					$max_size = 30000000;//max size
					$allowed_mime = array('application/pdf','application/msword','application/vnd.ms-excel','application/vnd.ms-powerpoint');//restrctions for types
					
					$destination = DOC_ROOT."_fileuploads".SEP."entries".SEP.$cat_name_dest.$lang_code.SEP;
					$dir_path = "_fileuploads".DIR_SEP."entries".DIR_SEP.$cat_name.$lang_code.DIR_SEP;
					
					try
					{
						$this->createDirectory($destination);
					}
					catch (Exception $e)
					{
						$err = "".$e->getMessage();
						exit($err);
					}	
					if(!isset($err))
					{
						$error=$_FILES[$field_name]["error"];
						$size=$_FILES[$field_name]["size"];
						$type=$_FILES[$field_name]["type"];
						$name=$_FILES[$field_name]["name"];
						
						//if($entryID<0||($entryID>0&&$_FILES[$field_name]["size"]>0))
						/*$err = "No file selected";
						Session::set('err_msg',$err."<br />"); $err."<br />";
						header("location:".$_SERVER['HTTP_REFERER']."");	
						return;		*/
						
						try
						{
							// check if file is uploaded
							if ( $_FILES[$field_name]['error'] != UPLOAD_ERR_OK)
							{
								throw new Exception("Upload Error:". $_FILES[$field_name]['error']);
							}
							// if the file is not less than the maximum allowed, print an error
							if ($max_size > 0 && ($_FILES[$field_name]['size'] >  $max_size ))
							{
								throw new Exception('Uploaded files cannot be greater than '.number_format($max_size).' bytes.');
							}
							// check for allowed mimes	
							if (count($allowed_mime)>0 && !in_array($_FILES[$field_name]['type'],$allowed_mime))
							{
								throw new Exception("Wrong File Type: ".$_FILES[$field_name]['type'].". Required Type: ".implode(';',$allowed_mime));
							}
						}
						catch (Exception $e)
						{	
							$err = $e->getMessage();
							Session::set('err_msg',$err."<br />"); $err."<br />";
							header("location:".$_SERVER['HTTP_REFERER']."");
							//exit($err);
						}
						if(!isset($err)||empty($err))
						{
							$ext = explode('.',strtolower($name));
							$ext = $ext[count($ext)-1];//file extension
							
							//record array
							$record['file_path'] = $destination;
							$record['dir_path'] = $dir_path;
							$record['extension'] = $ext;
							$record['mime'] = $type;
							$record['file_name'] = $name;
						}
					}
				}
			}
			else
			{
				if($entryID<0)
				{
					$record['file_path'] = "";
					$record['dir_path'] = "";
					$record['extension'] = "";
					$record['mime'] = "";
					$record['file_name'] = "";
				}
			}
		}//end check if is file type
		
		//add display_title into the record array
		if(array_key_exists('display_title',$_POST) && "" != trim($_POST['display_title']))
		{
			$record['langID'] = $langID;
			$record['userID'] = $userID;
			$record['catID'] = $this->catID;
			$record['display_title'] = trim($_POST['display_title']);
			if(array_key_exists('text',$_POST)&& ""!= trim($_POST['text']))
				$record['text'] = trim($_POST['text']);
				
			if(isset($_POST['external_link']))
				$record['external_link'] = trim($_POST['external_link']);
		}
		else
		{
			$err = "Empty title field";
			Session::set('err_msg',$err."<br />"); $err."<br />";
			header("location:".$_SERVER['HTTP_REFERER']."");
			exit;
		}
		
		//start transaction for save the data in to the database 
		include_once(LIB."dbdriver/dbFactory.php");
		$db = dbFactory::factory();
		$db->transaction();
		if($cat_arr['entrytypeID'] == FILE_ENTRY&&isset($_FILES[$field_name])&&$_FILES[$field_name]['error']!= UPLOAD_ERR_NO_FILE)
		{
			$handle = opendir(DOC_ROOT.$dir_path);
			$files = "files<br />";
			while (false !== ($entry = readdir($handle))) 
			{
				if($entry == $name)
				{
					$db->rollback();
					$err .="The ".$name." file allready exists . Please rename the file and try again!<br />"; 
					Session::set('err_msg',$err);
					//Session::set('err_msg',$err."<br />"); $err."<br />";
					header("location:".$_SERVER['HTTP_REFERER']."");
					exit;
				}
				$files .=$entry."<br />";
			}
		}
		//check if insert or update
		if($entryID>0)
		{
			//getting the old file name to delete if is needed to be replaced with new one
			if(isset($_FILES[$field_name])&&$_FILES[$field_name]['size']>0)
			{
				$entry_data = $basic_entry_data->getById($entryID);
				$old_dir_path = $entry_data['dir_path'];
				$old_name = $entry_data['file_name'];
				$old_file_path = DOC_ROOT.$old_dir_path.$old_name;
			}
			$basic_res = $basic_entry_data->updateRecord($entryID,$record,$db);
			$entrID = $entryID;
		}
		else
		{
			$basic_res = $basic_entry_data->insertRecord($record,$db);
			$entrID = $basic_res;
		}
			
		if($basic_res>=0)
		{
			$basic_entry_pr_key_name = $basic_entry_data->getPrKey();
			$entry_id = $entrID;//get new entry ID
			
			//get all the charateristics and prepare the entry if the charateristic exists for this category
			$charact_num = $charact_data->startIterator();
			$record_arrs = array();
			$zeroval_charact = array();
			if($charact_num>0)
			{
				while($charact_data->fetchNext($charact_data_arr))
				{	
					$chID = $charact_data_arr['chID'];
					$post_name = "chID".$chID;
					if(array_key_exists($post_name,$_POST)&&""!= trim($_POST[$post_name]))
					{
						if($charact_data_arr['is_date'] == 1)
							$ch_value = date('Y-m-d',strtotime($_POST[$post_name]));
						else
							$ch_value = trim($_POST[$post_name]);
					//create new array for entries into category_characteristics						
						$record_arrs[$chID] = array($basic_entry_pr_key_name=>$entry_id,'chID'=>$chID,'value'=>$ch_value);
					}
					else
					{
						//check if the post key exists and is empty field
						if(""== trim($_POST[$post_name])&&array_key_exists($post_name,$_POST))
						{
							//check in order not to delete the added dates
							if($charact_data_arr['is_date'] != 1)
								$zeroval_charact[$chID] = $entry_id;	
						}
					}
				}
			}
			
			foreach($charact_lists_ids as $chID=>$child_prKey)
			{
				if(array_key_exists($child_prKey,$_POST)&& ""!=$_POST[$child_prKey]&&-1!=$_POST[$child_prKey])
				{
					if(is_array($_POST[$child_prKey]))
					{
						foreach($_POST[$child_prKey] as $keys=>$valu)
						{
							$record_arrs[$chID][] = array($basic_entry_pr_key_name=>$entry_id,'chID'=>$chID,'value'=>$valu);
						}
					}
					else
					{					
						$record_arrs[$chID] = array($basic_entry_pr_key_name=>$entry_id,'chID'=>$chID,'value'=>$_POST[$child_prKey]);
					}
				}
			}
			
			//make records or update exsisting records foreach category<=>characteristic relation
			foreach($record_arrs as $arr_chID=>$record_arr)
			{
				//check if insert or update of the relation category<=>characteristic
				if(isset($record_arrs[$arr_chID][0]))
				{
					foreach($record_arrs[$arr_chID] as $subkey=>$subarr_chID)
					{
						$submited_values[] = $subarr_chID['value'];
						if($entryID>0)
						{
							$bas_ch_data_num = $entry_charact_data->startIterator(" AND chID=".$arr_chID." AND ".$basic_entry_pr_key_name." = ".$subarr_chID[$basic_entry_pr_key_name]."");
							
							if($bas_ch_data_num>0)
							{
								$bechdID = $entry_charact_data->getPrKey();
								while($entry_charact_data->fetchNext($entry_charact_data_arr))
								{
									/*//if(in_array($entry_charact_data_arr['value'],))
									$entry_charateristic_relation_id = $entry_charact_data_arr[$bechdID];
									$charact_result = $entry_charact_data->updateRecord($entry_charateristic_relation_id,$subarr_chID,$db);*/
									$entry_charateristic_relation_id = $entry_charact_data_arr[$bechdID];
									$exist_values[$entry_charateristic_relation_id]= $entry_charact_data_arr['value'];
								}
								if(!in_array($subarr_chID['value'],$exist_values))
									$charact_result = $entry_charact_data->insertRecord($subarr_chID,$db);
							}
							else
							{
								$charact_result = $entry_charact_data->insertRecord($subarr_chID,$db);
							}
						}
						else
							$charact_result = $entry_charact_data->insertRecord($subarr_chID,$db);
					}
					
					//check if some value is unchecked
					if(isset($exist_values)&&!empty($exist_values))
					{
						foreach($exist_values as $rel_id=>$exist_val)
						{
							if(!in_array($exist_val,$submited_values))
								$charact_result = $entry_charact_data->deleteID($rel_id,$db);
								
						}
					}
				}
				else
				{
					if($entryID>0)
					{
						$bas_ch_data_num = $entry_charact_data->startIterator(" AND chID=".$arr_chID." AND ".$basic_entry_pr_key_name." = ".$record_arr[$basic_entry_pr_key_name]."");
						if($bas_ch_data_num>0)
						{
							$bechdID = $entry_charact_data->getPrKey();
							$entry_charact_data->fetchNext($entry_charact_data_arr);
							$entry_charateristic_relation_id = $entry_charact_data_arr[$bechdID];
							$charact_result = $entry_charact_data->updateRecord($entry_charateristic_relation_id,$record_arr,$db);
						}
						else
						{
							$charact_result = $entry_charact_data->insertRecord($record_arr,$db);
						}
					}
					else
						$charact_result = $entry_charact_data->insertRecord($record_arr,$db);
				}
					
				if($charact_result<0)
				{
					$err = $charact_data->getError();
					$db->rollback();
					//exit($err);
					Session::set('err_msg',$err."<br />"); $err."<br />";
					header("location:".$_SERVER['HTTP_REFERER']."");
					exit;
				}
			}
			
			//check if some characteristic is deleted and delete the record if text input field is empty on edit .
			if(!empty($zeroval_charact))
			{
				$entry_ch_prkey = $entry_charact_data->getPrKey();
				foreach($zeroval_charact as $zero_chID=>$zero_entryid)
				{
					//check if characteristic with zeroval exists an delete it
					$zero_num = $entry_charact_data->startIterator(" AND chID=".$zero_chID." AND  ".$basic_entry_pr_key_name."=".$zero_entryid." ");
					if($zero_num>0)
					{
						while($entry_charact_data->fetchNext($zero_arr))
						{
							$zero_del_val = $entry_charact_data->deleteID($zero_arr[$entry_ch_prkey],$db);
							if($zero_del_val<0)
								echo $entry_charact_data->getError();
							
						}
					}
				}
			}
		}
		else
		{
			$err = $basic_entry_data->getError();
			$db->rollback();
			Session::set('err_msg',$err."<br />"); $err."<br />";
			header("location:".$_SERVER['HTTP_REFERER']."");
			exit;
			//exit($err);
		}
		
		//record if is different then file entry
		if($cat_arr['entrytypeID'] == TEXT_ENTRY)
		{
			if(!isset($err)||$err == "")
			{
				$db->commit();
				$succ_msg = "The entry was saved successfully.";
				$_SESSION['suc_msg'] = $succ_msg."<br />";
				header("location:".SITE_URL.SITE_ROOT."admin_modules/pages/entries_management/entries_list.php?catID=".$this->catID."");
			}
			else
			{
				$db->rollback();
				Session::set('err_msg',$err."<br />"); $err."<br />";
				header("location:".$_SERVER['HTTP_REFERER']."");
				exit;
			}
		}
		
		
		//making file operations if is file entry
		if($cat_arr['entrytypeID'] == FILE_ENTRY)
		{
			if((!isset($err)||$err == "")&&isset($_FILES[$field_name]['tmp_name'])&&$_FILES[$field_name]['tmp_name'] != '')
			{	
				$tmp_file = $_FILES[$field_name]['tmp_name'];
				$upl_err = move_uploaded_file($tmp_file,$destination.$name);
			}
			
			//set true if no file choosen in edit mode
			//if($entryID>0&&$_FILES[$field_name]["size"]==0)
			if($_FILES[$field_name]["size"] == 0)
				$upl_err = true;
			else
			{
				//delete the old file if is choosen new for replace
				if($entryID>0&&$_FILES[$field_name]['size']>0&&isset($old_file_path)&&""!= $old_file_path)
					@unlink($old_file_path);
			}
			//commit if no erros
			if($upl_err)
			{
				$db->commit();
				$succ_msg = "The entry was saved successfully.";
				$_SESSION['suc_msg'] = $succ_msg."<br />";
				header("location:".SITE_URL.SITE_ROOT."admin_modules/pages/entries_management/entries_list.php?catID=".$this->catID."");
			}
			else
			{
				$db->rollback();
				$err .= "Moving file error!Try again later or connect with the system adminisrator .";
				Session::set('err_msg',$err."<br />"); $err."<br />";
				header("location:".$_SERVER['HTTP_REFERER']."");
			}
		}
	}

	
	//function for creating directory
	function createDirectory($dest)
	{
		if(!is_dir($dest))
		{
			$r = mkdir ( $dest, 0755 ,true);
			if(!$r)
				throw new Exception("function mkdirreturned false while trying to created dir $dest");
		}
	}	
	
	//create member news form maybe not needed
	function createMemberNewsForm()
	{
		echo "If the news contains images please first upload them:<br />";
			echo "<form id='news_images_form' action='' method='post' enctype='multipart/form-data'>";
				echo "<div id='images_div'>";
					echo "<input type='file' name='images[]' id ='images[]' />";
				echo "</div>";
				echo "<div class=''>";
					echo "Add more image fields:";
					echo "<input type='button' class='btn btn-add' value='add' onclick='addImageField(\"images_div\");'/>";
				echo "</div>";
			echo "</form>";
	}
}

?>