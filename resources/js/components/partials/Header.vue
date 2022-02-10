<template>
  <header>
      <nav class="container">
          <ul>
              <li>
                  <a href="#">Home</a>
              </li>

              <li>
                  <a class="active" href="#">Blog</a>
              </li>

              <li>
                  <a href="#">Chi siamo</a>
              </li>

              <li>
                  <a href="#">Contatti</a>
              </li>
          </ul>
      </nav>
  </header>
</template>

<script>
export default {
    name: 'Header',
}
</script>

<style lang="scss" scoped>
    header{
        background-color: lightgray;
        height: 70px;
    }

    nav{
        ul{
            list-style: none;

            li{
                display: inline-block;
                line-height: 70px;
                padding-right: 8px;
                font-size: 20px;

                &:first-child{
                    padding-left: 6px;
                }

                a{ 
                    font-weight: bold;
                    color: black;
                    text-decoration: none;

                    &:hover{
                        color: white;
                        text-decoration: underline;
                    }

                    &.active{
                        color: white;
                    }
                }
                
            }
        }
    }
</style>