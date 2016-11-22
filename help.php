<?php include "session.php"; ?> 
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>  
<?php include "scripts.php"; ?>
<html>
  <head>
    <style>
       #map {
        height: 400px;
        width: 100%;
       }
    </style>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
  <h1 align="center"><b>Need some help ??</b></h1>
      <div class="container ">
      <div class="panel-group" id="faqAccordion">
          <div class="panel panel-default ">
                <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                <h4 class="panel-title">
                    <a href="#" class="ing">Q: what is this site for?</a>
              </h4>
            </div>
            <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h4><span class="label label-primary">Answer</span>
                    <p><br>This site(AnswersKart) gives a chance to interact with others who have intrest in programming and will allow you to ask and answer questions about programming.
                      <br>  You can take some programming tips from others to make your life easy and can also suggest some. 
                    </p></h4>
                </div>
            </div>
        </div>
         <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: Why should we use it?</a>
              </h4>

            </div>
            <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h4><span class="label label-primary">Answer</span>
                    <p><br>You have knowledge about some programming languages, but what about those 1000's of languages which you are unaware of. you can learn them from somewhere but what if you are stuck some where or encounter an error, you will need someone who have a proper knowledge about that language. Now finding that someone is more difficult, to make your search easy AnswersKart gathers people from different places to share their knowledge with others, who can help others with a specific problem in programming.
                    </p></h4>
                </div>
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: How to register/login?</a>
              </h4>

            </div>
            <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h4><span class="label label-primary">Answer</span>
                    <p><br>As you have made a decision to be a part of AnswersKart you have to register for this with a username and password and emailid. 
                    <br> After you register you have to login with those credentials and use them as you identity to ask/answer questions. You can see your profile page where you can add a picture of yours.
                    </p></h4>
                </div>
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: How to ask/answer a question?</a>
              </h4>

            </div>
            <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h4><span class="label label-primary">Answer</span>
                    <p><br>As soon as you login into the site you can see the Top Questions asked by differnt people. You can answer one of those questions or can also ask any question with a title and a tag(which will make a separation from other questions) in "Ask a Question" Tab. also you can see your questions in "My Questions", and you can also mark an answer from your question to make it as a correct answer so that others who see your question understands that the marked answer is the right solution to your problem stated.
                    </p></h4>
                </div>
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question4">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q: How to interact with others?</a>
              </h4>

            </div>
            <div id="question4" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h4><span class="label label-primary">Answer</span>
                    <p><br>You can see the questions of other users posted by them by "Search", and also can ask them some doubts beyond their question in their solutions itself.
                    </p></h4>
                </div>
            </div>
        </div>
        <div class="panel panel-default ">
            <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question5">
                 <h4 class="panel-title">
                    <a href="#" class="ing">Q:Other useful things?</a>
              </h4>

            </div>
            <div id="question5" class="panel-collapse collapse" style="height: 0px;">
                <div class="panel-body">
                     <h4><span class="label label-primary">Answer</span>

                    <p><br>AnswersKart allows you to answer/upvote/downvote any question you would like to. Also you can see the recent questions uploaded irrespective of the programming language. You can mark a question so as to make that question a part of top Questions(the question with highest marks will be a top question and next questions are organized based upon the  next highest marks).   qwq </p></h4>
                </div>
            </div>
        </div>
    </div>

    <h3><b><u>Our Office Location</u></b></h3>
    <h4> Contact: (phone) +1 815-517-5322
        <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; (Fax) +1 111-2223334
        <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; address: 1055W,48th Street,Norfolk,VA-23508.</h4>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat: +36.8866884, lng: -76.3002960};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpJltk7G4M2douCfM_AdNzJvrHKyZh2uE&callback=initMap">
    </script>
    </div>
  </body>
</html>