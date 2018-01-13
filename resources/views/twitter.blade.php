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
       <form class="well" action="{{route('post.tweet')}}" method="POST" enctype="multipart/form-data">
         {{csrf_field()}}
         @if(count($errors->all()) > 0)
           @foreach($errors as $error)
              <div class="alert alert-danger">
                {{$error}}
              </div>
           @endforeach
         @endif
         <div class="form-group">
           <label for="tweet">Tweet Text</label>
           <input type="text" class="form-control" id="tweet" name="tweet" placeholder="">
           <p class="help-block">Help text here.</p>
         </div>
         <div class="form-group">
           <label for="images">Upload image</label>
           <input type="file" name="images[]" multiple class="form-control-file">
           <small class="text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
         </div>
         <div class="form-group">
         <button type="submit" class="btn btn-success">Create Tweet</button>
         </div>

       </form>
       @if(!empty($data))
          @foreach($data as $key => $tweet)
                <div class="well">
                    <h3>{{ $tweet['text'] }}
                      <i class="glyphicon glyphicon-heart"></i> {{$tweet['favorite_count']}}
                      <i class="glyphicon glyphicon-repeat"></i> {{$tweet['retweet_count']}}
                    </h3>
                    @if(!empty($tweet['extended_entities']['media']))
                      @foreach($tweet['extended_entities']['media'] as $i)
                        <img src="{{$i['media_url_https']}}" style="width:100px;">
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
