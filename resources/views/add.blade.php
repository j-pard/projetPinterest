
<style>
      input {
            display: block;
            margin: 10px;
      }
</style>

      <h2>Add new restaurant to DB</h2>

      <nav>
            <a href="/">HOME</a>
      </nav>


      <!-- Create Post Form -->
      <form action="/create" method="POST">
            {{-- Token for cross-site security --}}
            {{ csrf_field() }}
            <input type="text" name="date" id="date" placeholder="Date de l'article">
            <input type="text" name="author" id="author" placeholder="Auteur">
            <input type="text" name="title" id="title" placeholder="Titre de l'article">
            <input type="text" name="image" id="image" placeholder="url image">
            <input type="textarea" name="description" id="description" rows="5" cols="30" placeholder="Décrire votre article">
            <input type="submit" value="Save">
      </form>
      

      <!-- Erros Handling -->
      @if ($errors->any())
      <div class="alert alert-danger">
            <ul>
                  @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
            </ul>
      </div>
      @endif
