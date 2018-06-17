@extends('layouts.master')

@section('title'){{'About Me - 私たちについて | StartUpCMS - Blog', ' | StartUpCMS - スタートアップのための軽くて速い堅牢なモダンスタイルCMS' }}@endsection

@section('content')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('assets/img/about-bg.jpg') }}')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>About Me</h1>
              <span class="subheading">This is what I do.</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p class="text-center">MESSAGE FROM CEO.</p>
            <h1 class="text-center">静岡から世界へ｜GO WILD!!</h1><br>
            <h3 class="text-center">千浜から全国へ。 そして、世界へ。</h3><br>
            <p class="text-center">私たちのミッションは、「この静岡から、世界中で使われるものを自分たち自身の手で作り出し、人々に幸せを届けること。」創業時から変わることのないこの思いを叶えるため、今もメンバー全員が努力し続けています。</p>
            <p class="text-center">私たちは、2012年3月に静岡県は掛川市の、海辺の小さな田舎町「千浜」という、自分たちの生まれ育った地で創業しました。「千浜」は遠州灘に面した、周りには海以外に何もない、海辺の小さな、どこにでもある田舎町です。しかしながら、千浜のような、どこにでもある片田舎こそ、人々の生活の基盤となる、衣食住の面で生活に欠かせないインフラとして、都心の生活を支えています。近年、地方経済の衰退や過疎化が叫ばれ続けておりますが、この静岡は千浜から世の中を変えるため、そして、ここ静岡で生活する人々の問題を解決させるために設立されました。</p>
            <p class="text-center">イノベーションを起こし、世界を変えていく巨大なプレイヤーも、元を辿れば、皆小さなベンチャーです。私たちはよく「田舎にあるWEB系の制作会社」や「地方の小さなゲームデベロッパー」と間違われますが、自分たちのことを、どこの地方にもあるような「WEBやゲームの制作会社」だとは、決して思っておりません。そうではなく、「 Think Different 」な仲間とともに、世の中を変えるため、チームで一丸となって、アイディアや理想を実現していくためのプラットフォームだと思っています。</p><br>
            <h3 class="text-center">千浜から全国へ。 そして、世界へ。<br>私たちは、お客様へ幸せを届けます。</h3><br>
            <p class="text-right">代表社員 / CEO　Takahisa Fujiwara</p><br>
        </div>
      </div>
    </div>
@endsection
