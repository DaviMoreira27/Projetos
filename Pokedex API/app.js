const numbPokemons = document.querySelector("#pokNum");
const tipoPokemon = document.querySelector("#tipos");
let numeroChange;

// TODO: Pelo amor de Deus, otimiza esse codigo o mais rapido possivel. - 08/06/2022

const numbFilter = addEventListener("input", (event) => {
  tipoPokemon.addEventListener("change", () => {
  let numeroChange = event.target.value.trim();

  const fetchAllPokemon = () => {
    const getpokemon = (id) => `https://pokeapi.co/api/v2/pokemon/${id}`;
    const pokemonPromises = [];

    for (let id = 1; id <= numeroChange; id++) {
      pokemonPromises.push(
        fetch(getpokemon(id)).then((response) => response.json())
      );
    }

    Promise.all(pokemonPromises).then((pokemons) => {
      const listPokemon = pokemons.reduce((accumulator, pokemon) => {
        const types = pokemon.types.map((typeInfo) => typeInfo.type.name);
        
          if (types[0] == tipoPokemon.value) {
            accumulator += `
            <li class="card ${types[0]}"> 
                <img class="card-image" alt="${
                  pokemon.name
                }" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${
              pokemon.id
            }.png">
                <h2 class="card-title">${pokemon.id}. ${pokemon.name}</h2>
                <p class="card-subtitle">${types.join(" | ")}</p>
            </li>
            `;
            
        } if (tipoPokemon.value == 'nenhum') {
            accumulator += `
            <li class="card ${types[0]}"> 
                <img class="card-image" alt="${
                  pokemon.name
                }" src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${
              pokemon.id
            }.png">
                <h2 class="card-title">${pokemon.id}. ${pokemon.name}</h2>
                <p class="card-subtitle">${types.join(" | ")}</p>
            </li>
            `;
          }
          return accumulator;
      }, "");

      const ul = document.querySelector('[data-js="pokedex"');

      ul.innerHTML = listPokemon;
      console.log(listPokemon);
      
    });
  };

  fetchAllPokemon();
});
    console.clear();
});
numbFilter;
