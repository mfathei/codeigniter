<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Email with Attachment in CodeIgniter</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8" style="margin: 0 auto; float: none;">
                <h3 align="center">Send Email with Attachment in CodeIgniter</h3>
                <br><br>
                <?php

                if($this->session->flashdata("message")){
                    echo '<div class="alert alert-success">' . $this->session->flashdata("message") . '</div>';
                }
                ?>
                <form method="post" action="<?php echo base_url() . 'sendemail/send'?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Enter Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Years of Experience</label>
                                <select name="experience" class="form-control" required>
                                    <option value="">Select Years of Experience</option>
                                    <option value="0-1 years">0-1 years</option>
                                    <option value="2-3 years">2-3 years</option>
                                    <option value="4-5 years">4-5 years</option>
                                    <option value="6-7 years">6-7 years</option>
                                    <option value="8-9 years">8-9 years</option>
                                    <option value="10 or more years">10 or more years</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Enter Address</label>
                                <textarea name="address" class="form-control" placeholder="Enter Address" rows="1" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Enter Mobile Number</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Enter Mobile Number" required pattern="\d*" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Enter Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email Address" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Your Resume</label>
                                <input type="file" name="resume" required accept=".doc,.docx,.pdf" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Programming Languages</label>
                                <select name="programming_languages[]" class="form-control" required multiple style="height:150px">
                                    <option value=".net">.NET</option>
                                    <option value="android">Android</option>
                                    <option value="asp">Asp</option>
                                    <option value="blackberry">Blackberry</option>
                                    <option value="c">C</option>
                                    <option value="c++">C++</option>
                                    <option value="cocoa">Cocoa</option>
                                    <option value="css">CSS</option>
                                    <option value="dhtml">DHTML</option>
                                    <option value="javascript">JavaScript</option>
                                    <option value="joomla">Joomla</option>
                                    <option value="lamp">LAMP</option>
                                    <option value="magento">Magento</option>
                                    <option value="mysql">MySQL</option>
                                    <option value="oracle">Oracle</option>
                                    <option value="perl">Perl</option>
                                    <option value="php">PHP</option>
                                    <option value="ruby on rails">Ruby on Rails</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Enter Additional Information</label>
                                <textarea name="additional_information" class="form-control" placeholder="Enter Additional Information" rows="7" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="form-group" align="center">
                                <input type="submit" name="submit" value="Submit" class="btn btn-info">
                            </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</body>
</html>