<?php
    drupal_add_css('//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css', array('type' => 'external'));
    drupal_add_js('sites/all/themes/ncsulibraries/scripts/minified/jquery.cycle.min.js', array('type' => 'file', 'scope' => 'footer'));
    drupal_add_js('sites/all/modules/custom/sirsi_parser/js/techdata.js', array('type' => 'file', 'scope' => 'footer'));
    drupal_add_js('jQuery(document).ready(function($) {
      $.get("/sites/default/files/techlending/devices_data/aggregate.json", function(data) {
          writeNumbers(data, ["lap"], ["dhhill", "hunt"]);
        }, "json");
      $("a[data-hook=\'toggle\']").click( function() {
        $(".availability").toggle(400, "swing");
      });});', array('type' => 'inline', 'scope' => 'footer'));
    // ><i class="icon-apple"></i></span><span class="t-nums">6 of 10</span></div>
    // <div class="t-row"><span class="cell-one" data-device="tab-win"><i class="icon-windows"></i></span><span class="t-nums">6 of 10</span></div>
    // <div class="t-row"><span class="cell-one" data-device="tab-droid"><i class="icon-android">
?>

<div id="page">
    <div class="row">
        <div class="column large-12">
            <?php if ($tabs): ?>
            <div class="tabs">
                <?php print render($tabs); ?>
            </div>
            <?php endif; ?>
            <?php //print $breadcrumb; ?>
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
                <h1 class="title" id="page-title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
        </div>
    </div>

    <div id="main" class="row">
        <?php if ($page['header']): ?>
            <div id="header" class="column large-12">
                <?php print render($page['header']); ?>
            </div>
        <?php endif; ?>

        <div id="main-content" class="main-content region column large-12">
            <p>The Libraries offer a multitude of devices that students, faculty and staff can check out. You can borrow most devices by asking at the main service desk at D. H. Hill, the Ask Us center at the Hunt Library, or at the Branches.</p>
            <p>Please <a href="/contacttechlending">contact us</a> if you have any questions or special requests.</p>

            <div class="row">
                <div class="column large-6">
                    <a href="/techlending/laptops" class="ignore"><img src="/sites/default/files/techlending/macbook.png" alt="Apple MacBook" class="float-right" /></a>
                    <h2><a href="/techlending/laptops">Laptops &amp; Netbooks</a></h2>
                    <p>Laptops and netbooks with either Mac or Windows operating systems are available.</p>
                    <ul>
                        <li>4 hour loan period</li>
                        <li>Available on a first come, first served basis from the main service desk</li>
                        <li><a href="/techlending/laptops">More details about these devices</a></li>
                        <li><a href="#" data-hook="toggle">See how many are available for check out right now <i class="icon-info-sign"></i></a></li>
                    </ul>
                    <div class="availability">
                        <div class="dhhill">
                            <div class="tab">
                                <p>D. H. Hill</p>
                            </div>
                            <div class="numbers"></div>
                        </div>
                        <div class="hunt">
                            <div class="tab">
                                <p>Hunt</p>
                            </div>
                            <div class="numbers"></div>
                        </div>
                    </div>
                    <?php
                      // $block = module_invoke('views', 'block_view', 'devices_device-block_1');
                      // print render($block);
                    ?>
                </div>

                <div class="column large-6">
                    <h2><a href="/techlending/cameras" class="ignore"><img src="/sites/default/files/techlending/flip.png" alt="a Flip Video Recorder" class="float-right" /></a><a name="cameras" id="cameras" href="/techlending/cameras">Digital Cameras &amp; Camcorders</a></h2>
                    <p>A variety of point-and-shoot digital cameras and HD video cameras are available for check out.</p>
                    <ul>
                        <li>Available for either 4 hour or 7 day loan period</li>
                        <li>Available on a first come, first served basis from the main service desk</li>
                        <li><a href="/techlending/cameras">More details about these devices</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="column large-6 ">
                    <h2><a href="/techlending/tablets" class="ignore"><img src="/sites/default/files/techlending/ipad.png" alt="Picture of an Apple iPad" class="float-right" /></a><a name="Tablets" id="tablets" href="/techlending/tablets">Tablets</a></h2>
                    <p>The Apple iPad and the iPad 2 as well as the Nexus 7 .</p>
                    <ul>
                        <li>Available for either 4 hour (iPad, iPad 2, Nexus 7) or 7 day loan period (iPad)</li>
                        <li>Available on a first come, first served basis from the main service desk</li>
                        <li><a href="/techlending/tablets">More details about these devices</a></li>
                    </ul>
                </div>

                <div class="column large-6">
                    <h2><a href="/techlending/dslr" class="ignore"><img src="/sites/default/files/techlending/olympuse620.png" alt="an Olympus E-620 Camera" class="float-right" /></a><a name="DSLRs" id="DSLRs" href="/techlending/dslr"><acronym title="digital single-lens reflex">DSLR</acronym> Cameras and Accessories</a></h2>
                    <p><acronym title="digital single-lens reflex camera">DSLR</acronym>, or digital single-lens reflex, cameras are  digital cameras that use a mechanical mirror system and pentaprism to direct light from the lens to an optical viewfinder on the back of the camera. These cameras are higher-end than the point-and-shoot variety and allow you to take higher quality photos.</p>
                    <ul>
                        <li>Check out by appointment  for 6 days</li>
                        <li><a href="/techlending/dslr">More details about these devices</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="column large-6">
                    <h2><a href="/techlending/ipods" class="ignore"><img src="/sites/default/files/techlending/ipod_touch.png" alt="Picture of an Apple iPod touch" class="float-right" /></a><a name="iPods" id="iPods" href="/techlending/ipods">iPods</a></h2>
                    <p>A wide variety of  iPods are available for viewing and playing your digital media files, including the iPod Touch with camera.</p>
                    <ul>
                        <li>7 day loan period</li>
                        <li>Available on a first come, first served basis from the main service desk</li>
                        <li><a href="/techlending/ipods">More details about these devices</a></li>
                    </ul>
                </div>

                <div class="column large-6">
                    <h2><a href="/techlending/gps" class="ignore"><img src="/sites/default/files/techlending/gpshandheld.png" alt="Picture of a Garmin GPSMAP 60CSx GPS unit" class="float-right" /></a><a name="GPS" id="GPS" href="/techlending/gps">GPS Units</a></h2>
                    <p>Garmin GPSMAP 60CSx, Garmin eTrex Summit HC, and Garmin StreetPilot c550 Global Positioning System (GPS) units.</p>
                    <ul>
                        <li>7 day loan period</li>
                        <li>Available on a first come, first served basis from the main service desk</li>
                        <li><a href="/techlending/gps">More details about these devices</a></li>
                    </ul>
                </div>
            </div>

        <div class="row">
            <div class="column large-6">
                <h2><a href="/techlending/ebooks" class="ignore"><img src="/sites/default/files/techlending/kindle3.png" alt="Kindle" class="float-right" /></a><a name="ebooks" id="ebooks" href="/techlending/ebooks">E-Readers</a></h2>
                <p>Amazon Kindles, Sony Readers and Barnes &amp; Nobles' Nooks.</p>
                <p>Amazon Kindles:</p>
                <ul>
                    <li>4 hour loan period for a Kindle loaded with a variety of current periodicals and newspapers</li>
                    <li>7 day loan period <a href="/techlending/holdform/">by request only</a> with pre-loaded titles of your choice (subject to availability)</li>
                    <li><a href="/techlending/ebooks">More details about these devices</a></li>
                </ul>
                <p>Sony Readers and Nooks:</p>
                <ul>
                    <li>7 day lending period</li>
                    <li>Available on a first come, first served basis from the main service desk</li>
                    <li><a href="/techlending/ebooks">More details about these devices</a></li>
                </ul>
            </div>

            <div class="column large-6">
                <h2><a href="/techlending/videocapture" class="ignore"><img src="/sites/default/files/techlending/elgato-lending.jpg" alt="Picture of a Legato video capture device" class="float-right" /></a><a name="videocapture" id="videocapture" href="/techlending/videocapture">Video Capture Device</a></h2>
                <p>The Elgato video capture device transfers video from a VCR, camcorder, or any other analog video source to a Mac or PC in a format that is ready for iTunes, Windows Media Player library, iPad, and YouTube. This device is conveniently compatible with the VHS, DV, and DVD converters in our Digital Media Lab, and its software is installed on our video editing workstations.</p>
                <ul>
                    <li>Available for a 4 hour lending period</li>
                    <li>Available on a first come, first served basis from the main service desk</li>
                    <li><a href="/techlending/videocapture">More details about these devices</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="column large-6">
                <h2><a href="/techlending/graphicstablet" class="ignore"><img src="/sites/default/files/techlending/bamboofun.png" alt="Picture of a Bamboo Fun Multi-touch Tablet" class="float-right" /></a><a name="graphicstablet" id="graphicstablet" href="/techlending/graphicstablet">Graphics Tablets</a></h2>
                <p>A graphics tablet is a computer input device that enables a user to hand-draw images and graphics. The Libraries has Wacom Intuous4 and Bamboo Fun Tablets available.</p>
                <ul>
                    <li>Available for either 4 hour or 7 day loan period</li>
                    <li>Available on a first come, first served basis from the main service desk</li>
                    <li><a href="/techlending/graphicstablet">More details about these devices</a></li>
                </ul>
            </div>

            <div class="column large-6">
                <h2><a href="/techlending/portabledvd" class="ignore"><img src="/sites/default/files/techlending/portabledvd.png" alt="Picture of an Audiovox D2017 Portable DVD Player" class="float-right" /></a><a name="dvd" id="dvd" href="/techlending/portabledvd">Portable DVD Players</a></h2>
                <p>Audiovox D2017 portable DVD players are available for viewing your CD and DVD media.</p>
                <ul>
                    <li>Available for a 4 hour loan period</li>
                    <li>Available on a first come, first served basis from the main service desk</li>
                    <li><a href="/techlending/portabledvd">More details about these devices</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="column large-6 ">
                <h2><a href="/techlending/presentationremotes" class="ignore"><img src="/sites/default/files/techlending/presentationremote.png" alt="Picture of a PR-PRO3 Presentation Remote" class="float-right" /></a><a name="dvd" id="dvd" href="/techlending/presentationremotes">Presentation Remotes</a></h2>
                <p>Keyspan PR-PRO3 presentation remotes are available.</p>
                <ul>
                    <li>3 day loan period</li>
                    <li>Available on a first come, first served basis from the main service desk</li>
                    <li><a href="/techlending/presentationremotes">More details about these devices</a></li>
                </ul>
            </div>

            <div class="column large-6">
                <h2><a href="/techlending/scanners" class="ignore"><img src="/sites/default/files/techlending/canoscan.png" alt="Picture of a Canon CanoScan LiDE200 Color Image Scanner" class="float-right" /></a><a name="scanner" id="scanner" href="/techlending/scanners">Scanners</a></h2>
                <p>Canon CanoScan color image flatbed scanners are available.</p>
                <ul>
                    <li>7 day loan period</li>
                    <li>Available on a first come, first served basis from the main service desk</li>
                    <li><a href="/techlending/scanners">More details about these devices</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="column large-6">
                <h2><a href="/techlending/voicerecorders" class="ignore"><img src="/sites/default/files/techlending/voicerecorder.png" alt="Picture of an Olympus DS-2300 Digital Voice Recorder" class="float-right" /></a><a name="dvr" id="dvr" href="/techlending/voicerecorders">Voice recorders</a></h2>
                <p>Olympus, Sony, and Zoom H2 digital voice recorders are available for field interviews, dictation, music recording, note-taking, and more.</p>
                <ul>
                    <li>Available for either 4 hour or 7 day loan period</li>
                    <li>Available on a first come, first served basis from the main service desk</li>
                    <li><a href="/techlending/voicerecorders">More details about these devices<br /></a></li>
                </ul>
            </div>

            <div class="column large-6">
                <h2><a href="/techlending/projectors" class="ignore"><img src="/sites/default/files/techlending/projector.png" alt="Picture of an Epson PowerLite 1716 Projector" class="float-right" /></a><a name="projectors" id="projectors" href="/techlending/projectors">Projectors</a></h2>
                <p>Projectors are available for  displaying presentations.</p>
                <ul>
                    <li>Available for either 4 hour or 3 day loan period</li>
                    <li>Available on a first come, first served basis from the main service desk</li>
                    <li><a href="/techlending/projectors">More details about these devices</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="column large-6 ">
                <h2><a href="/techlending/calculators" class="ignore"><img src="/sites/default/files/techlending/calculator83.png" alt="Picture of a TI 83+ graphing calculator" class="float-right" /></a><a name="TI-83+" id="TI-83+" href="/techlending/calculators">Calculators</a></h2>
                <p>TI-83+ &amp; TI-89 Titanium graphing, TI-30X IIS non-graphing, as well as HP 10bII financial calculators.        </p>
                <ul>
                    <li>Available for a 4 hour lending period</li>
                    <li>Available on a first come, first served basis from the main service desk</li>
                    <li><a href="/techlending/calculators">More details about these devices</a></li>
                </ul>
            </div>

            <div class="column large-6">
                <h2><a href="/techlending/headphones" class="ignore"><img src="/sites/default/files/techlending/headphones.png" alt="Picture of Cyber Acstcs Neckband Style Stereo Headphones" class="float-right" /></a><a name="headphones" id="headphones" href="/techlending/headphones">Stereo Headphones</a></h2>
                <p>Stereo headphones with microphones are available.</p>
                <ul>
                    <li>Available for a 4 hour lending period</li>
                    <li>Available on a first come, first served basis from the main service desk</li>
                    <li><a href="/techlending/headphones">More details about these devices</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="column large-6 ">
                <h2><a href="/techlending/flashdrives" class="ignore"><img src="/sites/default/files/techlending/flashdrive.png" alt="Picture of a Kingston 2GB USB Flash Drive" class="float-right" /></a><a name="flashdrives" id="flashdrives" href="/techlending/flashdrives">USB Flash Drives</a>          </h2>
                <ul>
                    <li>Available for a 3 day lending period</li>
                    <li>Available on a first come, first served basis from the main service desk</li>
                    <li><a href="/techlending/flashdrives">More details about these devices</a></li>
                </ul>
            </div>

            <div class="column large-6">
                <h2><a href="/techlending/dynamicmicrophone" class="ignore"><img src="/sites/default/files/techlending/mic-lending.jpg" alt="Picture of USB Micorophone" class="float-right" /></a><a name="microphone" id="microphone" href="/techlending/dynamicmicrophone">Dynamic Microphone</a></h2>
                <p>A CAD U1 USB microphone that records directly to your computer via USB is available for checkout.</p>
                <ul>
                    <li>Available for a 4 hour lending period</li>
                    <li>Available on a first come, first served basis from the main service desk</li>
                    <li><a href="/techlending/dynamicmicrophone">More details about these devices</a></li>
                </ul>
            </div>
        </div>

    </div>

    <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-left" class="column sidebar region large-4 <?php //print ns('pull-12', $page['sidebar_second'], 4); ?>">
            <?php print render($page['sidebar_first']); ?>
        </div>
    <?php endif; ?>

    <?php if ($page['sidebar_second']): ?>
        <div id="sidebar-right" class="column sidebar region large-4">
            <?php print render($page['sidebar_second']); ?>
        </div>
    <?php endif; ?>
</div>

    <?php if ($page['footer']): ?>
        <div id="footer" class="column large-12">
            <?php print render($page['footer']); ?>
        </div>
    <?php endif; ?>

