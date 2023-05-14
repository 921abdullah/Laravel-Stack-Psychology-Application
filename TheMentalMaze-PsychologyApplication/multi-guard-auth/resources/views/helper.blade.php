@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h2>Al-Quran</h2>
        <h1 style = "text-align: center;">وَتَعَاوَنُواْ عَلَى ٱلۡبِرِّ وَٱلتَّقۡوَىٰۖ</h1>
        <h2 class="lead" style = "text-align: center;">And cooperate in righteousness and piety</h2>
        <br>
        <br>
        <h1>So {{ Auth::user()->name }} !!</h1>
        <h2>There are two ways in which you can help the other patients, either through forming a support group 
            or helping them with the necessary resources ..
        </h2>
        <br>
        <div class="row">
            <div class="container-lg col-6">
                <h2>Fill the following, if you want to provide useful resources<br><span class="lead">Note: The suggestion would be anonymous and it could be any video, podcast, web link etc</span><br></h2>
                <form action = "{{url('resources')}}" method = "post">
                @csrf
                    <label for="category">Relevant Problem : </label>
                    <select name="category" id="category">
                        <option value="Anxiety">Anxiety</option>
                        <option value="Gender Dysphoria">Gender Dysphoria</option>
                        <option value="Mood Disorder">Mood Disorders</option>
                        <option value="Personality Disorder">Personality Disorder</option>
                        <option value="Eating Disorder">Eating Disorder</option>
                        <option value="Psychotic Disorder">Psychotic Disorder</option>
                        <option value="Sleep Disorder">Sleep Disorder</option>
                        <option value="Neurodevelopmental Disorder">Neurodevelopmental Disorder</option>
                        <option value="Trauma">Trauma</option>
                        <option value="Substance-related Disorder">Substance-related Disorder</option>
                    </select>
                    <br>
                    <label for="resource">URL : </label>
                    <input type="text" name="resource" id="resource">
                    <br>
                    <button type="submit">Submit</button>
                </form>
            </div>
            <div class="col-6">
                @if(count($group_data) == 0)
                <p><span class="lead">Fill the Form, in order to make a support group</span></p>
                <form action = "{{url('data-for-supportgroups')}}" method = "post">
                @csrf
                    <label for="category">Category : </label>
                    <select name="category" id="category">
                        <option value="Anxiety">Anxiety</option>
                        <option value="Gender Dysphoria">Gender Dysphoria</option>
                        <option value="Mood Disorder">Mood Disorders</option>
                        <option value="Personality Disorder">Personality Disorder</option>
                        <option value="Eating Disorder">Eating Disorder</option>
                        <option value="Psychotic Disorder">Psychotic Disorder</option>
                        <option value="Sleep Disorder">Sleep Disorder</option>
                        <option value="Neurodevelopmental Disorder">Neurodevelopmental Disorder</option>
                        <option value="Trauma">Trauma</option>
                        <option value="Substance-related Disorder">Substance-related Disorder</option>
                    </select>
                    <br>
                    <label for="name">Group Name : </label>
                    <input type="text" name="name" id="name">
                    <br>
                    <label for="description">Description : </label>
                    <br>
                    <textarea type="text" name="description" id="description"></textarea>
                    <br>
                    <label for="image">Group Image : </label>
                    <input type="file" id="image" name="image">
                    <br>
                    <button type="submit">Submit</button>
                </form>
                @else
                @foreach ($group_data as $group_data)    
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title" id="Group_name" >{{ $group_data->name }}</h5>
                        <p class="card-text">Group Created by you for {{ $group_data->category }}</p>
                        <a href="{{ url('/support-group/admin-view', ['name' => $group_data->name]) }}" class="btn btn-primary">Open</a>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
        
    </div>
    </div>
</div>
@endsection