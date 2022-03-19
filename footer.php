<?php
$bg_color_style = is_home() ? '--tw-bg-opacity: 1; background-color: rgb(0 165 158 / var(--tw-bg-opacity)); }' :''  ;
?>
<footer>
       <section style="<?php echo $bg_color_style ?>"
       class="newsletter -mt-[1px]">
        <div class="mx-auto w-2/3 md:container translate-y-[10.25rem]">
          <div class="bg-terranus-secondary-2 px-8 lg:px-4 xl:px-0">
            <div
              class="inner-container px-4 py-12 text-center text-white 2xl:px-16 2xl:pt-11 2xl:pb-10"
            >
              <h2
                class="mb-7 font-sans text-2xl font-bold uppercase text-white lg:text-4xl"
              >
                Newsletter
              </h2>
              <p class="font-sans-text mb-20 text-lg font-bold text-white">
                Melden Sie sich hier für den Newsletter an und erhalten
                regelmäßig Infos zu aktuellen Projekten, News und vielem mehr.
              </p>
              <form
                action="#"
                class="md:felx-row newsleter-form flex flex-col space-y-3 md:flex-row md:space-y-0 md:space-x-2.5"
              >
                <input
                  type="text"
                  class="font-sans-text placeholder:font-sans-text h-15 md:l-15 lg:h-15 appearance-none border-2 border-white bg-transparent px-6 text-lg font-medium text-white placeholder:text-lg placeholder:text-white focus:outline-none md:basis-4/5 md:text-xl xl:text-lg"
                  placeholder="e-Mail*"
                />
                <a
                  href="#"
                  class="border-2 border-white py-3 px-8 text-lg text-white md:basis-1/5"
                >
                  absenden
                </a>
              </form>
            </div>
          </div>
        </div>
      </section>
      <section class="bg-terranus-gray-1">
        <div class="mx-auto w-2/3 pt-40 md:container">
          <div
            class="inner-container flex flex-col lg:flex-row justify-between py-12 text-center text-white"
          >
            <div class="copy-right text-lg uppercase">© 2022 TERRANUS GmbH</div>
            <nav class="flex flex-col lg:flex-row space-x-3 text-lg mx-auto">
              <a href="">Impressum</a>
              <a href="">Datenschutz</a>
            </nav>
          </div>
        </div>
      </section>
    </footer>