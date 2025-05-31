@extends('layouts.pakar')
@section('title', 'Dashboard Pakar')

@section('content')
<h1>Welcome Back, {{ Auth::user()->nama }}!</h1>
<img src="{{ asset('images/logo.png') }}" alt="SOSMEDCARE" class="welcome-logo">
<p>
    Perkembangan teknologi informasi telah mendorong penggunaan media sosial seperti Instagram, TikTok, Facebook, dan X yang kini menjadi bagian dari kehidupan sehari-hari. Meskipun memberikan kemudahan dalam berinteraksi dan berbagi, penggunaan media sosial yang berlebihan dapat menyebabkan kecanduan, terutama pada remaja dan dewasa muda. Dampaknya meliputi penurunan produktivitas, gangguan psikologis, dan menurunnya kualitas hubungan sosial. Sayangnya, banyak orang tidak menyadari bahwa mereka telah kecanduan. Untuk mengatasi hal ini, dapat digunakan sistem pakar berbasis metode Backward Chaining yang mampu mendiagnosis tingkat kecanduan berdasarkan gejala yang dialami pengguna. Sistem ini diharapkan membantu masyarakat mengenali dan mencegah kecanduan media sosial sejak dini.
</p>
@endsection
