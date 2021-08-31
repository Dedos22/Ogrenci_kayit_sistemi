<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<?php
												    
                                                     include"../ayar.php";
                                                    
													   $ayarlar=$db->prepare("SELECT *  FROM bilim_dallari  WHERE birim_id ='".$birim."'");
                                                       $ayarlar->execute();
                                                       $ayarcek = $ayarlar->fetch(PDO::FETCH_ASSOC);

                                                    
                                                     ?>
											
													
                                             <label >ANA BILIM DALI:</label> 
											        
                                           <select  name="anabilimdali" >
										   ANA BILIM DALI:
                                           <option ><?php echo $ayarcek["site_desc"] ;?></option>

                                           </select>
                                           <br ><br>
										    <label >PROGRAM ADI:</label> 
                                                 <select  name="programadi" >
                                           <option value="<?php echo $ayarcek["site_desc"] ;?>"></option>

                                           </select><br><br>
										   	   
<body>
</body>
</html>
