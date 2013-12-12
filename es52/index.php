<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Snap-a-Chat-Beam</title>
        <meta name="description" content="ES52 Final Project" />
        <meta name="keywords" content="ES52, harvard, circuit, engineering" />
        <meta name="author" content="Jared Rosen" />
        <link rel="shortcut icon" href="../favicon.ico">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

        <link rel="stylesheet" type="text/css" href="css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />

        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-select.min.js"></script>
        <script src="js/jquery.prettyPhoto.js"></script>  
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
        <link rel="stylesheet" type="text/css" href="css/prettyPhoto.css">
        <script src="js/main.js"></script>
    </head>
    <body>
        <!-- <script>
            $(document).read(function(){
                var nav1 = $("#nav1").position()['top'];
                var nav2 = $("#nav2").position()['top'];
                var nav3 = $("#nav3").position()['top'];
                var nav4 = $("#nav4").position()['top'];
                var nav5 = $("#nav5").position()['top'];
            });
        </script> -->
        <header class="nav">
            <nav>
                <ul>
                    <li><a href="#nav1">Abstract</a> </li>
                    <li><a href="#nav2">Introduction</a></li>
                    <li><a href="#nav3">Design</a></li>
                    <li><a href="#nav4">Conclution</a></li>
                    <li><a href="#nav5">Appendix</a></li>
                </ul>
            </nav>
        </header>

        <div id="all">
            <a id="nav1"></a>
            <a id="nav2"></a>
            <a id="nav3"></a>
            <a id="nav4"></a>
            <a id="nav5"></a>

            <section id="main">
                <article class="article" id="nav1">
                    <p>Abstract</p>
                    <div class="test" id="abs">
                        <div id="video">
                            <iframe src="//www.youtube.com/embed/UpT98Q-6iDw" frameborder="0" allowfullscreen></iframe>
                            <iframe src="//www.youtube.com/embed/kYFkBnYIw-o" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <div>
                          <strong>Snap-a-Chat-Beam</strong> allows users to record an audio message of up to seven seconds and then transmit it over a distance of ~2 meters to a receiver where the message will be saved until the playback button is pressed. The messages can be optionally modified with one of two filters (“chipmunk” to speed up the message or “sloth” to slow the message down). One the receiving end, there is a countdown display that shows how much time is left in the message during playback (just like the real Snapchat!). Each message can only be sent and played back one time. 
                        </div>
                        </br></br>
                        <div style="text-align: center;">
                            <a href="img/1.jpg" rel="prettyPhoto[pp_gal]" title="Transmit Stage"><img src="img/1.jpg" width="70" height="70" /></a>
                            <a href="img/2.jpg" rel="prettyPhoto[pp_gal]"  title="Transmit Stage"><img src="img/2.jpg" width="70" height="70" /></a>
                            <a href="img/3.jpg" rel="prettyPhoto[pp_gal]" title="Receive Stage"><img src="img/3.jpg" width="70" height="70" /></a>
                            <a href="img/4.jpg" rel="prettyPhoto[pp_gal]" title="Receive Stage"><img src="img/4.jpg" width="70" height="70" /></a>
                        </div>
                    </div>
                </article>
                
                <article class="article" id="nav2">
                    <p>Introduction</p>
                    <div class="test" id="int">
                      We wanted to design a system that allows users to send fun, ephemeral  audio messages to each other. Based on the media sensation, Snapchat, we are hoping to capitalize on the multibillion dollar disappearing messaging sector to create “the next Facebook” (except ours is obviously cooler because it uses lasers!). Our project is a fun toy for anyone who has a seven second audio message to send and a friend to listen to it on the other end (or someone who pities you enough to play along).</br></br>
Our project has two major components--the transmitting stage and the receiving stage. Both are pieces are centered on a Arduino Due microcontroller (of which we used 2), which is used to digitize and store the message and control the user experience. Additionally both stages use analog filtering, amplification, etc., to maintain the highest possible audio quality though the record-->store-->transmit-->record-->store-->playback sequence.</br></br>
While building Snap-a-Chat-Beam, we wanted to create a system that was very easy/intuitive to use and we let that guide our design process. We hid the internal complexity of the system behind a very simple user interface. The transmission stage has just two push buttons (record and transmit) and two DPDT switches (one for each filter). The receiving stage was even simpler; there is only one button (playback)--that’s fewer buttons than on the iPhone! Additionally, we added indicator LEDs, labeled accordingly so the user would also know what was going on with the system. Furthermore, we designed our project to run off of single supplies, a 9V battery for the transmission and the reception circuits, so it easy to transport/setup, which presented interesting design considerations, which are discussed in the next section.
                    </div>
                </article>
                
                <article class="article" id="nav3">
                    <p>Design</p>
                    <div class="test" id="des">
                      <h3>Systems Breakdown</h3>
There are two functional units in our project, the “transmitter” and the “receiver”. The former records an audio signal when the user triggers the microphone, converting it to laser light when given a second command. The latter system receives this laser light, converts it back to a digital signal, finally playing the audio aloud when the user triggers playback.</br></br>

<h3>Subsystems</h3>
On the <strong>“Transmission”</strong> side, <strong>Subsystem A</strong> is the microphone system, which takes in audio when the “record” button is pressed, filtering it through the bandpass filter, and feeds it into the Arduino Due. We based this system in part on the audio mixing lab, which was where we got the Tow-Thomas filter. We adjusted the component values to give us the range of human speech (300-3,400Hz). One design issue we encountered was the fact that we ran the LMC6482s in the band-pass filter off of a single supply, and we had to accordingly add a ½Vcc pseudo-ground into the non-inverting terminal of each LMC6482. Before we added this pseudo-ground (and virtually grounding the LMC6482s), we were seeing loss of resolution and clipping resulting from the single-sourced op-amp, an analogous issue to the one encountered in the Heart Rate Monitor lab.</br></br>

<strong>Subsystem B</strong> takes the signal out of the Due through a low-pass filter in order to smooth the quantized signal when the “transmit” button is pressed, buffering this output and allowing for some gain to be applied via a potentiometer. We picked and tested these values for a 5KHz 3dB point, which we saw worked fine because the purpose of the low-pass filter is to get rid of the very fast jumps between different steps of the quantized signal, smoothing the resultant wave. Building the buffer was straightforward, and only required empirical testing to see what position of the potentiometer maximized the resolution of the wave passed to the laser. We did this testing with an oscilloscope and by “single sequencing” parts of the resultant wave.</br></br>

<strong>Subsystem C</strong> is a user-interface component, which allows to switch the laser’s input from the audio to the 3.3V source. Pivoting from the former to the latter allows targeting of the laser beam on the sensor during setup. We built this having realized that connecting the laser to a voltage source every time we wanted it to stay on for targeting was a big pain! Adding this switch was a very helpful innovation.</br></br>

<strong>Subsystem D</strong> is the “fun filter” add-on we created. This is two switches, labeled “Chipmunk” and “Sloth”, which cue the Arduino to either speed up or slow down the signal before transmission. We added indicator lights to this and connected them to the Due. Executing the filters themselves was a trial-and-error process in the code to pick new integers determining the speed of writing the audio signal back into the breadboard for transmission by the laser.</br></br>

On the <strong>“Reception”</strong> side, <strong>Subsystem A</strong> is the sensor system, which outputs a value based on the intensity of light, taking in the signal and passing it to the second Arduino Due when the signal exceeds a threshold (i.e., when the laser is shone on the sensor). This comparison is done by, well, a Comparator. We had difficulty getting the right acuity for the comparator, and discussed various solutions to prevent momentary dips by the signal, close to the level of ambient light, from telling the Arduino to stop reception. One solution that we discussed was adding hysteresis, but picking the right level for the comparator was difficult. In the end, we solved this issue in code, by saying that once triggered, the system would “listen” to the incoming signal as long as it did not dip near the minimum level of the comparator more than a particular number of times (optimum determined by trial-and-error). One of the key non-electronics elements that helped with the reception was a laser-cut box, which held the sensor in place to maximize contact with the laser beam signal and blocked out ambient light, as well as a laser-cut stand for the laser, to help improve aiming and consistency of the laser.</br></br>

<strong>Subsystem B</strong> is playback, which when the user pressed the appropriate button, takes the signal out of the Due, smooths it again and removes any extraneous noise by putting it through a bandpass filter, a push-pull amplifier, and allows for user-chosen volume control via a potentiometer. Finally, this signal goes through the TRRS jack, for playback via a speaker or headphones. The band pass filter was straightforward, given that we already built it for the same range (300-3,400Hz) on the transmission end.</br></br> 

<strong>Subsystem C</strong> is the Numitron display, which counts down the number of seconds left in the message as it is playing back, controlled by the second Arduino Due. We started with the circuit from Lab 7, adapting the code to be a countdown from a runtime-determined point, and added code that allowed the Arduino to keep track of timing (second-to-second) while running and minimally affecting performance.</br></br>

<h3>Results</h3>
Our system was, in every metric we set out at the beginning of the project, a success! The number one evaluation criterion we had was: “is the audio signal, transmitted across 1+ meters, clear and intelligible when played back through headphones or speakers?” And in each demonstration of our project, we achieved this goal. Further, we achieved an intelligible signal even when the two audio filters (sloth and chipmunk) are applied, which was a product of understanding our code and trial-and-error process.</br></br>

Not only did we manage to implement the “extra” of our sloth and chipmunk fun filters, we also added a Numitron display (not considered in the original proposal), synthesizing material from previous in ES52 and also further mimicking the style of Snapchat. Thus, we achieved the signal acuity in the context of two additional features, both of which successfully mimic our inspiration for the project.</br></br>

We also achieved our goal of a clear layout and user interface. Having completed the technical aspects of our project, we separated the design elements from the user elements (indicator LEDs, buttons to press, switches to adjust) on separate breadboards, labeling each button and light accordingly. This maximizes the user’s ability to interact with our project on both the transmission and reception ends.</br></br>

Lastly, we were effective in dealing with the number one limitation of our project, the RAM of the two Arduino Dues. We were able to sample at a rate that gave excellent resolution, and maximize the memory that we did have available by filtering noisy signals and giving more acuity at the playback end. Having 7-second messages is exactly the goal we set for ourselves, mirroring the Snapchat model of limited message length, maximum fun!</br></br>

<h3>Design Narrative</h3>
Overall, our design process was very smooth and progressed via an iterative, “build, test, evaluate, refine” method. We had a high-level concept of what we wanted our project to do, both for the digital and the analog sides. We then conceived of the actual circuitry, which we discussed, researched online, and drew upon previous labs for a jumping-off point. Our major stumbling block was the clarity of the reception circuit, the issue that we attempted to fix with hysteresis at first, as discussed above, eventually simplifying the problem and solving in software. The parts we found easy were filtering (which was old hat by this point), and creating some of the software ended up being pretty straightforward. Overall, our group dynamic was highly cooperative and supportive, and while we generally collaborated on each stage of the project, we also found opportunities to “divide and conquer”, helping speed up the build while still drawing on one another’s support

</div>
                </article>
                <article class="article" id="nav4">
                    <p>Conclution</p>
                    <div class="test" id="res">
                        When we started this project, we set out to accomplish the following goals: 
<ol>
  <li>Effective execution of concept</li>
  <li>Addition of features that increase project complexity</li>
  <li>Coherent user interface</li>
  <li>Demonstrated mastery of audio signals, handled in both digital and analog systems, and laser beam transmission thereof </li>
</ol></br>
  As well, there were 3 add-on features that, in an optimal implementation of our project, we proposed to have one of them completed and integrated into our design. They are encoding/decryption, multiple message storage (either with one of the buttons or multiple ones), or modification of the signal with different vocal filters.</br></br>
  
  Our project accomplishes each of the 4 conceptual goals, and integrating one of the add-on features (the voice modification via vocal filters), in addition to a surprise add-on feature, the Numitron display.</br></br>
The concept we executed was a device that records and stores audio, transmits it via laser beam, and then plays it back to the user, with an emphasis on allowing for each of these tasks to happen exactly when the user wants them to. We accomplished this by implementing a recording stage, a transmission stage, and a playback stage, where each stage has a push button to allow the user to decide when they want the stage to start. Adding indicator LEDs to tell the user when each stage was undergoing, as well as the numitron countdown display (à la actual Snapchat) accomplished a coherent user interface, where the user could know what step was currently happening, and respond how and when they wanted.</br></br>
  Our project’s success was dependent upon the repeated conversion between analog and digital signals. Our use of the Tow-Thomas band-pass filters (from the Audio Equalizer Lab) as well as buffering op-amps, use of pseudo-ground to allow our device to function on a single supply power source, and quantized signal processing within software allowed for our project to effectively handle the audio signals (within the range of human voice) passed and transmitted through the systems as well as the laser we used to transmit them.</br></br>
  
  The feature we decided to add on to our project was the modification of the signal with different vocal filters. By adjusting the rate used to write the audio signal to the laser, we were able to speed up or slow down the signal to accomplish a “chipmunk” or “sloth” filter, respectively. These were integrated into the user interface with two DPDT switches and indicator LEDs to show whether these filters were on or off. Although it was not in our original proposal, we also added on a count-down using the Numitron display to improve the user feedback of the system.</br></br>
Some future improvements to our project would include implementing the other 2 add-ons that we had discussed, encryption, and allowing for the storage and receipt of multiple messages. Also, though we were thrilled with the distance we achieved with our current build, a huge innovation would be adding a sensor that is red-light sensitive. This would allow the system to send the signal much farther, which would be a more fun implementation of the same concept.</br></br>
In addition, a problem with the breadboard implementation of our project was that wires to and from the Arduino cluttered the space around the user input, and made our implementation look messier. If we used a PCB to make 2 different Arduino shields (one for the transmission and recording Arduino and one for the receiving and playback Arduino) we would be able to achieve a much cleaner and more condensed implementation of our project. As well, this would prevent bugs in our hardware resulting from loose wires, as soldered joints would be used to make the shield.
                    </div>
                </article>
                <article class="article" id="nav5">
                    <p>Appendix</p>
                    <div class="test" id="app">
                        <h3>Transmit Code</h3>
                        <div class="code">
                            <code>
                                // definitions and globals</br>
                                #define RESOLUTION 16 // the analogReadResolution and analogWriteResolution</br>
                                #define MAX_SAMPLES 42000 // the max number of samples</br>
                                #define LENGTH 7000 // length of message in ms</br>
                                #define RECORD_DELAY 200 // dealy to achive about 6000Hz and 7s</br>
                                #define TRANSMIT_DELAY 240 // dealy to match record frequecny/time</br>
                                #define LASER_OFFSET 379 // ofset voltage for the laser 1024/2.7</br>
                                #define CHIPMUNK 100 // how much faster than "normal" to make the transmition</br>
                                #define SLOTH 50 // how much slower than "normal" to make the transmition</br>
                                unsigned short msg[MAX_SAMPLES]; // stored the audio message</br>
                                </br>
                                // pins
                                int ai = A1;  // audio in</br>
                                int ao = DAC1; // audio out</br>
                                int rb = 2; // record button</br>
                                int tb = 3; // transmit button</br>
                                int rLED = 4; // recording LED</br>
                                int mLED = 5; // recorded message LED</br>
                                int tLED = 6; // transmit LED</br>
                                int cm = 12; // chipmunk filter switch</br>
                                int sl = 13; // sloth filter switch</br>
                                </br>
                                void setup() {</br>
                                  &nbsp;// put your setup code here, to run once:</br>
                                  &nbsp;// audio pins</br>
                                  &nbsp;pinMode(ai, INPUT);</br>
                                  &nbsp;pinMode(ao, OUTPUT);</br>
                                  &nbsp;</br>
                                  &nbsp;// buttons pins</br>
                                  &nbsp;pinMode(rb, INPUT);</br>
                                  &nbsp;pinMode(tb, INPUT);</br>
                                  &nbsp;</br>
                                  &nbsp;// status LEDs pins</br>
                                  &nbsp;pinMode(rLED, OUTPUT);</br>
                                  &nbsp;pinMode(mLED, OUTPUT);</br>
                                  &nbsp;pinMode(tLED, OUTPUT);</br>
                                  &nbsp;</br>
                                  &nbsp;// filter pins</br>
                                  &nbsp;pinMode(cm, INPUT);</br>
                                  &nbsp; pinMode(sl, INPUT);</br>
                                  &nbsp; </br>
                                  &nbsp;// initializations</br>
                                  &nbsp;analogReadResolution(RESOLUTION);</br>
                                  &nbsp;analogWriteResolution(RESOLUTION);</br>
                                  &nbsp;Serial.begin(9600);</br>
                                }</br>
                                </br>
                                void loop() {</br>
                                  &nbsp;// put your main code here, to run repeatedly: </br>
                                  &nbsp;int startRecord = millis();</br>
                                  &nbsp;int countSamples = 0;</br>
                                  &nbsp;boolean recorded = false;</br>
                                  &nbsp;boolean cmf = false;</br>
                                  &nbsp;int filter_delay = TRANSMIT_DELAY;</br>
                                  </br>
                                  &nbsp;if(((millis() - startRecord) < LENGTH) && (countSamples < MAX_SAMPLES) && (digitalRead(rb) == LOW))</br>
                                  &nbsp;{</br>
                                    &nbsp;&nbsp;// debounce by cheking button down again after a short delay</br>
                                    &nbsp;&nbsp;delayMicroseconds(1000);</br>
                                    &nbsp;&nbsp;digitalWrite(rLED, HIGH);</br>
                                  &nbsp;}</br>
                                  &nbsp;</br>
                                  &nbsp;while(((millis() - startRecord) < LENGTH) && (countSamples < MAX_SAMPLES) && (digitalRead(rb) == LOW))</br>
                                  &nbsp;{
                                    &nbsp;&nbsp;msg[countSamples] = analogRead(ai);</br>
                                    &nbsp;&nbsp;countSamples++;</br>
                                    &nbsp;&nbsp;recorded = true;</br>
                                    &nbsp;&nbsp;delayMicroseconds(RECORD_DELAY); // found through experimentation to keep the sampaling rate at (approximately) 6kHz</br>
                                  &nbsp;}</br>
                                  &nbsp;&nbsp;</br>
                                  &nbsp;if(recorded == true)</br>
                                  &nbsp;{</br>
                                    &nbsp;&nbsp;digitalWrite(rLED, LOW);</br>
                                    &nbsp;&nbsp;digitalWrite(mLED, HIGH);</br>
                                    &nbsp;&nbsp;boolean cms = digitalRead(cm);</br>
                                    &nbsp;if(cms == true)</br>
                                    &nbsp;{</br>
                                     &nbsp;&nbsp; filter_delay -= CHIPMUNK;</br>
                                     &nbsp;&nbsp; cmf = true;</br>
                                    &nbsp;}</br>
                                   &nbsp; if((digitalRead(sl) == HIGH) && (cmf == false))</br>
                                   &nbsp; {</br>
                                     &nbsp;&nbsp; filter_delay += SLOTH;</br>
                                    &nbsp;}</br>
                                    &nbsp;do</br>
                                    &nbsp;{</br>
                                    &nbsp;&nbsp;  delayMicroseconds(10);</br>
                                    &nbsp;} while (digitalRead(tb) == HIGH);</br>
                                    &nbsp;&nbsp;digitalWrite(tLED, HIGH);</br>
                                    &nbsp;&nbsp;digitalWrite(mLED, LOW);</br>
                                    &nbsp;&nbsp;for(int i; i < countSamples; i++)</br>
                                    &nbsp;{</br>
                                    &nbsp;&nbsp; analogWrite(ao, (msg[i] + LASER_OFFSET));</br>
                                    &nbsp;&nbsp; delayMicroseconds(filter_delay); // found through experimentation to keep the sampaling rate of record and transmit (approximately) the same</br>
                                    &nbsp;}</br>
                                    &nbsp;&nbsp;digitalWrite(tLED, LOW);</br>
                                    &nbsp;&nbsp;analogWrite(ao, 0);</br>
                                  &nbsp;}</br>
                                  &nbsp;else // recorded == false</br>
                                  &nbsp;{</br>
                                    &nbsp;&nbsp;// make sure all of the LEDs are off</br>
                                    &nbsp;&nbsp;digitalWrite(rLED, LOW);</br>
                                    &nbsp;&nbsp;digitalWrite(mLED, LOW);</br>
                                    &nbsp;&nbsp;digitalWrite(tLED, LOW);</br>
                                    &nbsp;&nbsp;restmsg();</br>
                                  &nbsp;}</br>
                                }</br>
                                </br>
                                void restmsg()</br>
                                {</br>
                                 &nbsp;for(int i; i < MAX_SAMPLES; i++)</br>
                                 &nbsp;{</br>
                                    &nbsp;&nbsp;msg[i] = 0;</br>
                                &nbsp;}</br>
                                &nbsp;return; </br>
                                } </br>
                            </code>
                        </div>
                        <a class="link" target="_blank" href="https://www.dropbox.com/s/oql75fd19ce0y1b/GM_t_version6.ino">Download Source</a>
                        <h3>Reciever Code</h3>
                        <div class="code">
                            <code>
                                // definitions and globals
                                </br>#define RESOLUTION 16 // the analogReadResolution and analogWriteResolution
                                </br>#define MAX_SAMPLES 47000 // the max number of samples
                                </br>#define RECORD_DELAY 150 // dealy to achive about 6000Hz and 7s
                                </br>#define TRANSMIT_DELAY 177 // dealy to match record frequecny/time
                                </br>#define COUNTDOWN_DELAY 5000 // how many samples are writen per second to keep the count doan a 1s intervals
                                </br>#define DEBOUNCE 1000 // how many low readings from comparator before recording stops 
                                </br>  
                                </br>unsigned short msg[MAX_SAMPLES]; // stored the audio message
                                </br>int clock_array[8]; // array specificing which segements to turn on
                                </br>
                                </br>// initialize arrays with numeral display
                                </br>int w0[8] = {0,0,1,1,1,1,1,1};
                                </br>int w1[8] = {0,0,0,0,0,1,1,0};
                                </br>int w2[8] = {0,1,0,1,1,0,1,1};
                                </br>int w3[8] = {0,1,0,0,1,1,1,1};
                                </br>int w4[8] = {0,1,1,0,0,1,1,0};
                                </br>int w5[8] = {0,1,1,0,1,1,0,1};
                                </br>int w6[8] = {0,1,1,1,1,1,0,1};
                                </br>int w7[8] = {0,0,0,0,0,1,1,1};
                                </br>int w8[8] = {0,1,1,1,1,1,1,1};
                                </br>int w9[8] = {0,1,1,0,1,1,1,1};
                                </br>
                                </br>// pins
                                </br>int ai = A0;  // audio in
                                </br>int ao = DAC0; // audio out
                                </br>
                                </br>int rb = 2; // comparater
                                </br>int tb = 3; // transmit button
                                </br>int rLED = 4; // recording LED
                                </br>int mLED = 5; // recorded message LED
                                </br>int tLED = 6; // transmit LED
                                </br>
                                </br>int clk = 7; // clock for cound down
                                </br>int sdi = 8; // output bits for clound down
                                </br>int pwr = 9; // turn on count down
                                </br>
                                </br>void setup() {
                                  </br>&nbsp;// put your setup code here, to run once:
                                  </br>&nbsp;// audio pins
                                  </br>&nbsp;pinMode(ai, INPUT);
                                  </br>&nbsp;pinMode(ao, OUTPUT);
                                  </br>
                                  </br>&nbsp;// buttons pins
                                  </br>&nbsp;pinMode(rb, INPUT);
                                  </br>&nbsp;pinMode(tb, INPUT);
                                  </br>
                                  </br>&nbsp;// status LEDs pins
                                  </br>&nbsp;pinMode(rLED, OUTPUT);
                                  </br>&nbsp;pinMode(mLED, OUTPUT);
                                  </br>&nbsp;pinMode(tLED, OUTPUT);
                                  </br>
                                  </br>&nbsp;// cound down pins
                                  </br>&nbsp;pinMode(clk, OUTPUT);
                                  </br>&nbsp;pinMode(sdi, OUTPUT);
                                  </br>&nbsp;pinMode(pwr, OUTPUT);
                                  </br>
                                  </br>&nbsp;// turn display off
                                  </br>&nbsp;digitalWrite(pwr, LOW);  
                                  </br>
                                  </br>&nbsp;// initializations
                                  </br>&nbsp;analogReadResolution(RESOLUTION);
                                  </br>&nbsp;analogWriteResolution(RESOLUTION);
                                  </br>&nbsp;Serial.begin(9600);
                                </br>}
                                </br>
                                </br>void loop() {
                                  </br>&nbsp;// put your main code here, to run repeatedly: 
                                  </br>&nbsp;int countSamples = 0;
                                  </br>&nbsp;boolean recorded = false;
                                  </br>&nbsp;boolean recording = false;
                                  </br>&nbsp;int low = 0;
                                  </br>&nbsp;int clock_value = 0;
                                  </br>
                                  </br>&nbsp;if((countSamples < MAX_SAMPLES) && (digitalRead(rb) == HIGH))
                                  </br>&nbsp;{
                                    </br>&nbsp;&nbsp;// delayMicroseconds(1000);
                                    </br>&nbsp;&nbsp;digitalWrite(rLED, HIGH);
                                    </br>&nbsp;&nbsp;recording = true;
                                    </br>&nbsp;&nbsp;clock_value = millis();
                                  </br>&nbsp;}
                                  </br>
                                  </br>&nbsp;while((countSamples < MAX_SAMPLES) && (recording == true) && (low < DEBOUNCE))
                                  </br>&nbsp;{
                                    </br>&nbsp;&nbsp;msg[countSamples] = analogRead(ai);
                                    </br>&nbsp;&nbsp;countSamples++;
                                    </br>&nbsp;&nbsp;recorded = true;
                                    </br>&nbsp;&nbsp;delayMicroseconds(RECORD_DELAY); // found through experimentation to keep the sampaling rate at (approximately) 6kHz
                                    </br>&nbsp;&nbsp;if(digitalRead(rb) == LOW) // after DEBOUNCE number of low samples (max 1/6th second) stop recording
                                    </br>&nbsp;&nbsp;{
                                      </br>&nbsp;&nbsp;&nbsp;low++;
                                    </br>&nbsp;&nbsp;}
                                  </br>&nbsp;}
                                  </br>  
                                  </br>&nbsp;if(recorded == true)
                                  </br>&nbsp;{
                                    </br>&nbsp;&nbsp;digitalWrite(rLED, LOW);
                                    </br>&nbsp;&nbsp;digitalWrite(mLED, HIGH);
                                    </br>&nbsp;&nbsp;do
                                    </br>&nbsp;&nbsp;{
                                      </br>&nbsp;&nbsp;&nbsp;delayMicroseconds(10);
                                    </br>&nbsp;&nbsp;} while (digitalRead(tb) == HIGH);
                                    </br>
                                    </br>&nbsp;&nbsp;digitalWrite(tLED, HIGH);
                                    </br>&nbsp;&nbsp;digitalWrite(mLED, LOW);
                                    </br>&nbsp;&nbsp;digitalWrite(pwr, HIGH);
                                    </br>
                                    </br>&nbsp;&nbsp;for(int i; i < countSamples; i++)
                                    </br>&nbsp;&nbsp;{
                                      </br>&nbsp;&nbsp;&nbsp;analogWrite(ao, msg[i]);
                                      </br>&nbsp;&nbsp;&nbsp;if ((clock_value >= 0) && (i % COUNTDOWN_DELAY == 0))
                                      </br>&nbsp;&nbsp;&nbsp;{
                                        </br>&nbsp;&nbsp;&nbsp;&nbsp;switch (clock_value)
                                        </br>&nbsp;&nbsp;&nbsp;&nbsp;{
                                          </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case 0:
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;write_numeral(w0);
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;break;
                                          </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case 1:
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;write_numeral(w1);
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;break;
                                          </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case 2:
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;write_numeral(w2);
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;break;
                                          </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case 3: 
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;write_numeral(w3);
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;break;
                                          </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case 4:
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;write_numeral(w4);
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;break;
                                          </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case 5:
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;write_numeral(w5);
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;break;
                                          </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case 6:
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;write_numeral(w6);
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;break;
                                          </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case 7:
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;write_numeral(w7);
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;break;
                                          </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case 8:
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;write_numeral(w8);
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;break;
                                          </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;case 9:
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;write_numeral(w9);
                                            </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;break;
                                          </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;break;
                                        </br>&nbsp;&nbsp;&nbsp;&nbsp;}
                                        </br>&nbsp;&nbsp;&nbsp;&nbsp;for (int n = 0; n < 8; n++)
                                        </br>&nbsp;&nbsp;&nbsp;&nbsp;{
                                          </br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;outBit(clock_array[n]);
                                        </br>&nbsp;&nbsp;&nbsp;&nbsp;}
                                        </br>&nbsp;&nbsp;&nbsp;&nbsp;clock_value--;
                                      </br>&nbsp;}
                                      </br>&nbsp;&nbsp;&nbsp;&nbsp;delayMicroseconds(TRANSMIT_DELAY); // found through experimentation to keep the sampaling rate of record and transmit (approximately) the same
                                    </br>&nbsp;&nbsp;&nbsp;}
                                    </br>&nbsp;&nbsp;&nbsp;digitalWrite(tLED, LOW);
                                    </br>&nbsp;&nbsp;&nbsp;digitalWrite(pwr, LOW);
                                  </br>&nbsp;&nbsp;}
                                  </br>&nbsp;&nbsp;else // recorded == false
                                  </br>&nbsp;&nbsp;{
                                    </br>&nbsp;&nbsp;&nbsp;// make sure all of the LEDs are off
                                    </br>&nbsp;&nbsp;&nbsp;digitalWrite(rLED, LOW);
                                    </br>&nbsp;&nbsp;&nbsp;digitalWrite(mLED, LOW);
                                    </br>&nbsp;&nbsp;&nbsp;digitalWrite(tLED, LOW);
                                    </br>&nbsp;&nbsp;&nbsp;restmsg();
                                  </br>&nbsp;&nbsp;} 
                                </br>&nbsp;}
                                </br>
                                </br>void restmsg()
                                </br>{
                                  </br>&nbsp;for(int i; i < MAX_SAMPLES; i++)
                                  </br>&nbsp;{
                                    </br>&nbsp;&nbsp;msg[i] = 0;
                                  </br>&nbsp;}
                                  </br>&nbsp;return;
                                </br>}
                                </br>
                                </br>// function to write bits to output
                                </br>void outBit (int value)
                                </br>{
                                  </br>&nbsp;digitalWrite(sdi, value);
                                  </br>&nbsp;digitalWrite(clk,0);
                                  </br>&nbsp;digitalWrite(clk, 1);
                                  </br>&nbsp;return;
                                </br>}
                                </br>
                                </br>// function to pass appropriate array to Numitron display
                                </br>void write_numeral(int value[])
                                </br>{
                                  </br>&nbsp;for (int n = 0; n < 8; n++)
                                    </br>&nbsp;{
                                      </br>&nbsp;&nbsp;clock_array[n] = value[n];
                                    </br>&nbsp;}
                                    </br>&nbsp;return;
                                </br>}
                            </code>
                        </div>
                        <a class="link" target="_blank" href="https://www.dropbox.com/s/jfdwlymb8j554jt/GM_r_version3.ino">Download Source</a>
                        </br>
                        <h3>Circuit Diagrams</h3>
                        <div style="text-align: center;">
                            <a href="img/transmit-1.jpg" rel="prettyPhoto[pp_gal]" title="Audio to Arduino"><img src="img/transmit-1.jpg" width="70" height="70" /></a>
                            <a href="img/transmit-2.jpg" rel="prettyPhoto[pp_gal]"  title="Arduino to Laser"><img src="img/transmit-2.jpg" width="70" height="70" /></a>
                            <a href="img/record-1.jpg" rel="prettyPhoto[pp_gal]" title="Sensor to Arduino"><img src="img/record-1.jpg" width="70" height="70" /></a>
                            <a href="img/record-2.jpg" rel="prettyPhoto[pp_gal]" title="Arduino to Audio"><img src="img/record-2.jpg" width="70" height="70" /></a>
                        </div>
                      </br>
                      <h3>Arduino Pins</h3>
                      <strong>Transmit Stage</strong>
                      <ol>
                        <li>pin A1 -- audio in</li>
                        <li>pin DAC1 -- audio out</li>
                        <li>pin 2 -- record button</li>
                        <li>pin 3 -- transmit button</li>
                        <li>pin 4 -- recording LED</li>
                        <li>pin 5 -- recorded message LED</li>
                        <li>pin 6 -- transmit LED</li>
                        <li>pin 12 -- chipmunk filter switch</li>
                        <li>pin 13 -- sloth filter switch</li>
                      </ol>
                        <strong>Receive Stage</strong>
                      <ol>
                          <li>pin A0 -- audio in</li>
                          <li>pin DAC0 -- audio out</li>
                          <li>pin 2 -- record button</li>
                          <li>pin 3 -- transmit button</li>
                          <li>pin 4 -- recording LED</li>
                          <li>pin 5 -- recorded message LED</li>
                          <li>pin 6 -- transmit LED</li>
                          <li>pin 7 -- clock for countdown</li>
                          <li>pin 8 -- output bits for countdown</li>
                          <li>pin 9 -- turn on/off countdown</li>
                      </ol>
                    </br>
                    <h3>Bibliography</h3>
                    <ul>
                      <li><a class="link" href="http://sim.okawa-denshi.jp/en/Fkeisan.htm">http://sim.okawa-denshi.jp/en/Fkeisan.htm</a></li>
                      <li>ES50 Lab 8</li>
                      <li>Labs from ES52: Heart Rate Monitor (pseudo-ground), Audio Mixing (Tow-Thomas band-pass filter), Numitron Die (interfacing of numeral display to a microcontroller, wiring of Numitron with TLC5916 driver)</li>
                      <li><a class="link" href="http://www.instructables.com/id/Send-Music-over-a-Laser-Beam/?ALLSTEPS">http://www.instructables.com/id/Send-Music-over-a-Laser-Beam/?ALLSTEPS</a></li>
                    </ul>
                  </div>
                </div>
                </article>
            </section>
        <div>

      <!-- Introductory Modal -->
<div class="modal fade" id = "introModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <center><h1 class="modal-title">Snap-a-Chat-Beam</h1></center>
      </div>
      <div class="modal-body">
        <center>
          Bobby Flitsch</br>
          Ari Brenner</br>
          Jared Rosen</br></br>
          December 13, 2013</br>
        </center>
      </div>
       <center><button type="button" class="btn btn-primary" data-dismiss="modal">Close & View Project</button></center></br>
    </center>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

      <script type="text/javascript">
        $('#introModal').modal();
        $("a[rel^='prettyPhoto']").prettyPhoto();
          console.log("premature load");
      </script>
    </body>
</html>


