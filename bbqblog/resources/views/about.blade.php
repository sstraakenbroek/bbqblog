@extends('layout.base')

@section('page.title', config('app.name').' - '.$pageTitle)
@section('masthead.background', asset('storage/img/about.jpg'))
@section('masthead.title', $pageTitle)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p>Bacon ipsum dolor amet capicola tail andouille, shank porchetta burgdoggen spare ribs jerky tongue leberkas pig picanha. Chicken shankle hamburger, alcatra cow pancetta beef. Kevin picanha landjaeger capicola, short loin filet mignon drumstick meatball short ribs pork pig boudin tenderloin turkey kielbasa. Tail andouille ribeye kielbasa alcatra beef ribs rump filet mignon brisket ground round. Salami shank spare ribs beef ribs short loin drumstick ribeye biltong pork sirloin sausage turducken porchetta venison. Burgdoggen shank sirloin buffalo, cow flank pastrami turkey.</p>
                <p>Jowl cupim venison porchetta cow, turducken turkey biltong prosciutto pork chop filet mignon. Doner strip steak shankle ham hock kevin flank ribeye pork belly spare ribs ham landjaeger short ribs corned beef. Venison porchetta ground round tri-tip rump t-bone pancetta. T-bone flank jerky landjaeger short loin pork belly. Pork pork chop pork loin picanha, tenderloin alcatra pancetta corned beef cow flank.</p>
            </div>
        </div>
    </div>
@endsection