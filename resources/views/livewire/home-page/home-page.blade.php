<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fire Extinguisher Guide</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Reset and basic styling */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            color: #333;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
      display: flex;
      overflow-x: auto;
      scroll-snap-type: x mandatory;
      scroll-behavior: smooth;
      -webkit-overflow-scrolling: touch;
    }

    .card-1 {
      flex: 0 0 100%;
      scroll-snap-align: start;
      position: relative;
    }

    .card-1 img {
      display: block;
      margin: 0 auto;
      max-width: 100%;
      height: auto;
    }

    .card-info {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .card-1:hover .card-info {
      opacity: 1;
    }
    
    /* Card/Box styling */
        .card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            margin-bottom: 10px;
            color: #ff6b6b;
        }

        /* Flex container for Tips and Emergency Numbers */
        .flex-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .flex-container > div {
            flex: 1;
            margin-right: 20px;
        }

        .flex-container > div:last-child {
            margin-right: 0;
        }

        /* Video-Tutorials flex row */
        .video-tutorials {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .video-box {
            flex: 1 1 calc(60% - 20px);
        }

        .tutorials {
            flex: 1 1 calc(40% - 20px);
        }

        .video-box iframe {
            width: 100%;
            height: 100%;
        }

        .tutorials h3 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #ff6b6b;
        }

        /* Icons */
        .icon {
            color: #ff6b6b;
            margin-right: 10px;
        }
        .icon-green {
            color: green; /* Customize icon color */
            margin-right: 10px;
        }
        .icon-blue {
            color: lightseagreen; /* Customize icon color */
            margin-right: 10px;
        }

        /* Responsive styles */
        @media (max-width: 480px) {
            h1 {
                font-size: 24px;
            }

            h2 {
                font-size: 20px;
            }

            h3 {
                font-size: 18px;
            }

            .flex-container {
                flex-direction: column;
            }

            .flex-container > div {
                margin-right: 0;
                margin-bottom: 20px;
            }

            .video-tutorials {
                flex-direction: column;
            }

            .video-box {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
            <div class="container">
                <div class="card-1">
                <img src="{{ asset('assets/img/powder1.png')}}" style="width: 100px; height:200px;" alt="Powder">
                  <div class="card-info">
                    <h1>Powder</h1>
                    <p>A fire extinguishing agent in powder form, typically used for extinguishing fires involving flammable liquids and electrical fires.</p>
                  </div>
                </div>
                <div class="card-1">
                <img src="{{ asset('assets/img/Foam2.png') }}"style="width: 170px; height:230px;" alt="Foam">
                  <div class="card-info">
                    <h1>Foam</h1>
                    <p>Firefighting foam is a stable mass of small bubbles with a lower density than oil, gasoline, or water. It is used to extinguish fires involving flammable liquids.</p>
                  </div>
                </div>
                <div class="card-1">
                <img src="{{ asset('assets/img/Co2.png') }}" style="width: 200px; height:220px;"  alt="CO2">
                  <div class="card-info">
                    <h1>CO2</h1>
                    <p>Carbon dioxide fire extinguishers are primarily used for electrical fire and flammable liquid fires. CO2 displaces oxygen, removing it from the fire triangle.</p>
                  </div>
                </div>
                <div class="card-1">
                <img src="{{ asset('assets/img/water.png') }}" style="width: 200px; height:220px;" alt="Water">
                  <div class="card-info">
                    <h1>Water</h1>
                    <p>Water is a traditional fire extinguishing agent, primarily used for fires involving solid combustible materials such as wood, paper, and textiles.</p>
                  </div>
                </div>
                <div class="card-1">
                <img src="{{ asset('assets/img/wet.png') }}"style="width: 200px; height:220px;" alt="Wet Chemical">
                  <div class="card-info">
                    <h1>Wet Chemical</h1>
                    <p>Wet chemical fire extinguishers are specifically designed for use on cooking oil and grease fires, such as those in kitchen environments.</p>
                  </div>
                </div>
              </div>

    <div class="flex-container">
        <div class="card">
            <h2><i class="fas fa-phone-alt icon"></i> Emergency Numbers</h2>
            
            <p>In case of an emergency, call:</p>
            <ul>
                <li><i class="fas fa-truck-monster icon"></i> Fire Department: 911</li>
                <li><i class="fas fa-building icon"></i> Local Fire Station: (123) 456-7890</li>
            </ul>
        </div>

        <div class="card">
            <h2><i class="fas fa-lightbulb icon-green" style="color:green;"> Tips</i></h2>
            <ul>
                <li>Always keep a fire extinguisher in an easily accessible location.</li>
                <li>Check the expiration date and pressure gauge regularly.</li>
                <li>Know the different types of fire extinguishers and which one to use for each fire class.</li>
                <li>Remember the PASS technique: Pull, Aim, Squeeze, Sweep.</li>
            </ul>
        </div>
    </div>

    <section>
        <div class="card video-tutorials">
            <div class="video-box">
                <h2><i class="fas fa-video icon"></i> How to Use a Fire Extinguisher</h2>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/VIDEO_ID" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

			@if(auth()->user()->hasRole('Maintenance Personnel'))
            		@livewire('home-page.home-page')
			

            <div class="tutorials">
                <h3 style="margin-right:10px;"><i class="fas fa-book-open icon icon-blue" style="color:lightseegreen;">Fire Extinguisher Maintenance</i></h3>
                <p>Regular maintenance of fire extinguishers is crucial for their effectiveness in an emergency situation. Here are tips on how to maintain your fire extinguisher:</p>
                <ul>
                    <li>Check the pressure gauge regularly to ensure it's within the recommended range.</li>
                    <li>Inspect the extinguisher for any signs of damage or corrosion.</li>
                    <li>Make sure the nozzle and hose are clear of any obstructions.</li>
                    <li>Verify the expiration date and replace the extinguisher if it has expired.</li>
                    <li>Consider professional inspection and servicing annually.</li>
                </ul>
            </div>
            @endif
        </div>
    </section>

    <div class="card">
        <h2><i class="fas fa-ban icon"></i> How NOT to Use a Fire Extinguisher</h2>
        <ol>
            <li>Don't aim the extinguisher at people.</li>
            <li>Don't use water extinguishers on electrical or grease fires.</li>
            <li>Don't hesitate to evacuate if the fire is too large.</li>
            <li>Don't assume the fire is completely extinguished until it has been properly cooled.</li>
        </ol>
    </div>

    <footer>
        <p>&copy; 2023 Fire Extinguisher Guide. All rights reserved.</p>
    </footer>
     <script>
  
    const cards = document.querySelectorAll('.card-1');

    // Clone the first and last cards for infinite looping
    const firstCard = cards[0].cloneNode(true);
    const lastCard = cards[cards.length - 1].cloneNode(true);

    container.insertAdjacentElement('afterbegin', lastCard);
    container.insertAdjacentElement('beforeend', firstCard);

    let isDragging = false;
    let startPos = 0;
    let currentTranslate = 0;
    let prevTranslate = 0;
    let animationID = 0;
    const animationDuration = 500; // in milliseconds

    function setTranslate(xPos) {
      container.style.transform = `translateX(${xPos}px)`;
    }

    function handleGesture() {
      if (currentTranslate === prevTranslate) return;

      const howManyMoved = Math.abs(currentTranslate - prevTranslate);
      const maxMovement = window.innerWidth / 2;
      const movementRatio = howManyMoved / maxMovement;

      if (movementRatio > 1) {
        currentTranslate = prevTranslate + maxMovement * (currentTranslate > prevTranslate ? 1 : -1);
      }

      setTranslate(prevTranslate + currentTranslate);

      const isNextMove = prevTranslate > currentTranslate;
      const nextOrPrev = isNextMove ? 'next' : 'prev';

      requestAnimationFrame(() => smoothMove(isNextMove, nextOrPrev));
    }

    function smoothMove(isNext, direction) {
      const containerWidth = container.clientWidth;
      let nextTranslate = isNext ? currentTranslate - containerWidth : currentTranslate + containerWidth;

      if (Math.abs(nextTranslate) > containerWidth) {
        const slideNumber = Math.round(Math.abs(nextTranslate) / containerWidth);
        nextTranslate += containerWidth * (isNext ? slideNumber : -slideNumber);
      }

      animateSmoothly(currentTranslate, nextTranslate, direction);
    }

    function animateSmoothly(from, to, direction) {
      const startTime = performance.now();
      const valueRange = to - from;

      function animation() {
        const elapsed = performance.now() - startTime;
        const progress = elapsed / animationDuration;
        const value = from + valueRange * Math.min(progress, 1);

        setTranslate(value);

        if (progress < 1) {
          animationID = requestAnimationFrame(animation);
        } else {
          if (direction === 'next') {
            container.appendChild(container.firstElementChild);
          } else {
            container.insertBefore(container.lastElementChild, container.firstElementChild);
          }

          setTranslate(0);
          prevTranslate = 0;
          currentTranslate = 0;
        }
      }

      if (!animationID) {
        animationID = requestAnimationFrame(animation);
      }
    }

    container.addEventListener('pointerdown', (e) => {
      isDragging = true;
      startPos = e.pageX;
      prevTranslate = currentTranslate;
    });

    container.addEventListener('pointermove', (e) => {
      if (!isDragging) return;
      currentTranslate = prevTranslate + (e.pageX - startPos);
      setTranslate(prevTranslate + currentTranslate);
    });

    container.addEventListener('pointerup', () => {
      isDragging = false;
      handleGesture();
    });

    container.addEventListener('pointercancel', () => {
      isDragging = false;
    });
  </script>
</body>
</html>