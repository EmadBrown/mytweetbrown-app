<!DOCTYPE html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>MyTweetBrown</title>
    <link rel="stylesheet" href="/css/app.css">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  </head>
  <body>
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">MyTweetBrown</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

     <div class="container">
       @if(!empty($data))
          @foreach($data as $key => $tweet)
                <div class="well">
                    <h3>{{ $tweet['text'] }}
                      <i class="glyphicon glyphicon-heart"></i> {{$tweet['favorite_count']}}
                      <i class="glyphicon glyphicon-repeat"></i> {{$tweet['retweet_count']}}
                    </h3>
                    @if(!empty($tweet['extended_entities']['media']))
                      @foreach($tweet['extended_entities']['media'] as $image)
                          <img src="$image['media_url_https']" alt="" width="100">
                      @endforeach
                    @endif
                </div>
          @endforeach
        @else
          <p>No Tweets Found</p>
       @endif
     </div>
  </body>
</html>
