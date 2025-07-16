import EmblaCarousel from 'embla-carousel'
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollToPlugin } from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollTrigger,ScrollToPlugin);

// Importing styles
import "../scss/main.scss";

// Menu
const menuToggle = () => {
  const hd = document.querySelector('.hd');
  const ham = document.querySelector('.hd-ham');
  const nav = document.querySelector('.hd-nav');
  const navItems = nav.querySelectorAll('.hd-nav-item')


  const resizeFunc = () => {
    if (matchMedia('(min-width: 768px)').matches) {
      hd.classList.remove('is-open');
      nav.classList.remove('is-open');
      ham.classList.remove('is-open');
      ham.removeAttribute('aria-expanded');
      nav.removeAttribute('aria-hidden');
    } else {
      ham.setAttribute('aria-expanded', 'false');
      nav.setAttribute('aria-hidden', 'true');
    }
  }
  // Initial resize check
  resizeFunc();

  // Resize event listener
  window.addEventListener('resize', resizeFunc);

  const navOpen = () => {
    ham.setAttribute('aria-expanded', 'true');
    nav.setAttribute('aria-hidden', 'false');
    nav.classList.add('is-open');
    ham.classList.add('is-open');
    gsap.fromTo(navItems, {
      opacity: 0,
      x: 30
    }, {
      opacity: 1,
      x: 0,
      duration: 0.3,
      delay: 0.1,
      ease: 'power2.out',
      stagger: {
        amount: 0.1,
        from: "start"
      }
    });
  }

  const navClose = () => {
    nav.classList.remove('is-open');
    ham.classList.remove('is-open');
    hd.classList.remove('is-open');

    if (matchMedia('(max-width: 767px)').matches) {
      ham.setAttribute('aria-expanded', 'false');
      nav.setAttribute('aria-hidden', 'true');
    }
  }

  // Initial setup
  ham.addEventListener('click', () => {
    hd.classList.toggle('is-open');
    if (hd.classList.contains('is-open')) {
      navOpen();
    } else {
      navClose();
    }
  });

  // nav link click event
  const navLinks = nav.querySelectorAll('.hd-nav-link');
  navLinks.forEach(link => {
    link.addEventListener('click', (event) => {
      navClose();
    });
  });

  // Scroll event to change header style
  const updateHeaderStyle = () => {
  const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  const kv = document.querySelector('.kv');

  if (kv) {
    if (scrollTop > kv.offsetHeight - 50) {
      hd.classList.add('is-scrolled');
    } else {
      hd.classList.remove('is-scrolled');
    }
  } else {
    hd.classList.add('is-scrolled');
  }
}

window.addEventListener('load', updateHeaderStyle);
window.addEventListener('scroll', updateHeaderStyle);
}

// Hash change for smooth scrolling
const hashChange = () => {
  // 通常クリック時
  document.addEventListener('click', function (e) {
    const anchor = e.target.closest('a[href^="#"]');
    if (anchor) {
      const href = anchor.getAttribute('href');
      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        gsap.to(window, {
          scrollTo: {
            y: target,
            autoKill: false,
          },
          duration: 1,
          ease: 'power2.inOut',
        });
        setTimeout(() => {
          history.replaceState(null, '', href); // ハッシュ更新（履歴に追加しない）
        }, 1000);
      }
    }
  });

  // 初回読み込み時：location.hash がある場合だけ遅延してスクロール
  window.scrollTo(0,0);
  window.addEventListener('load', () => {
    window.scrollTo(0,0);
    const hash = location.hash;
    if (!hash) return; // ハッシュがない場合は何もしない

    const target = document.querySelector(hash);
    if (hash && target) {
      console.log('Hash found:', hash);
      // 一瞬トップにとどまり、遅延してからスムーズにスクロール
      setTimeout(() => {
        gsap.to(window, {
          scrollTo: {
            y: target,
            autoKill: false,
          },
          duration: 1,
          ease: 'power2.inOut',
        });
      }, 200); // ←遅延時間（お好みで調整）
    }
  });
};

// Embla Carousel initialization
const emblaInit = () => {
  const OPTIONS = {
    align: 'start',
    duration: 25,
    breakpoints: {
      '(min-width: 768px)': { active: false }
    }
  };
  const emblaNode = document.querySelector('.embla');
  
  if (!emblaNode) return;

  const viewportNode = emblaNode.querySelector('.embla__viewport');
  const dotsNode = emblaNode.querySelector('.embla__dots');

  const emblaApi = EmblaCarousel(viewportNode, OPTIONS);

  const addDotBtnsAndClickHandlers = (emblaApi, dotsNode) => {
    let dotNodes = []

    const addDotBtnsWithClickHandlers = () => {
      dotsNode.innerHTML = emblaApi
        .scrollSnapList()
        .map(() => '<button class="embla__dot" type="button"></button>')
        .join('')

      const scrollTo = (index) => {
        emblaApi.scrollTo(index)
      }

      dotNodes = Array.from(dotsNode.querySelectorAll('.embla__dot'))
      dotNodes.forEach((dotNode, index) => {
        dotNode.addEventListener('click', () => scrollTo(index), false)
      })
    }

    const toggleDotBtnsActive = () => {
      const previous = emblaApi.previousScrollSnap()
      const selected = emblaApi.selectedScrollSnap()
      dotNodes[previous].classList.remove('embla__dot--selected')
      dotNodes[selected].classList.add('embla__dot--selected')
    }

    emblaApi
      .on('init', addDotBtnsWithClickHandlers)
      .on('reInit', addDotBtnsWithClickHandlers)
      .on('init', toggleDotBtnsActive)
      .on('reInit', toggleDotBtnsActive)
      .on('select', toggleDotBtnsActive)

    return () => {
      dotsNode.innerHTML = ''
    }
  }

  const removeDotBtnsAndClickHandlers = addDotBtnsAndClickHandlers(
    emblaApi,
    dotsNode
  );

  emblaApi.on('destroy', removeDotBtnsAndClickHandlers);
};

// Accordion
const accordionToggle = () => {
  const triggers = document.querySelectorAll('.js-acc-trigger');

  // 初期化
  triggers.forEach(trigger => {
    const content = trigger.nextElementSibling;
    content.classList.remove('is-open');
    trigger.classList.remove('is-open');
    trigger.setAttribute('aria-expanded', 'false');
    content.setAttribute('aria-hidden', 'true');
    content.style.height = '0';
    content.style.overflow = 'hidden';
  });

  triggers.forEach(trigger => {
    trigger.addEventListener('click', () => {
      const content = trigger.nextElementSibling;
      content.classList.toggle('is-open');
      trigger.classList.toggle('is-open');
      // ARIA属性の更新
      trigger.setAttribute('aria-expanded', content.classList.contains('is-open'));
      content.setAttribute('aria-hidden', !content.classList.contains('is-open'));

      if (content.classList.contains('is-open')) {
        gsap.to(content, { height: content.scrollHeight, duration: 0.3 });
        // ARIA属性の更新
        trigger.setAttribute('aria-expanded', 'true');
        content.setAttribute('aria-hidden', 'false');
      } else {
        gsap.to(content, { height: 0, duration: 0.3 });
        // ARIA属性の更新
        trigger.setAttribute('aria-expanded', 'false');
        content.setAttribute('aria-hidden', 'true');
      }
    });
  });
}

// gsap animation
const gsapAnimation = () => {
  // mask-img
  const maskImgs = document.querySelectorAll('.mask-img');
  maskImgs.forEach(maskImg => {
    if (maskImg.classList.contains('is-fast')) {
      return; // is-fastクラスがある場合はアニメーションをスキップ
    }
    ScrollTrigger.create({
      trigger: maskImg,
      start: 'top bottom',
      toggleClass: 'is-visible',
      once: true,
    });
  });

  // fade-in
  const fadeIns = document.querySelectorAll('.fadein-wrap');
  fadeIns.forEach(fadeIn => {
    const fadeInItems = fadeIn.querySelectorAll('.fadein-item');
    gsap.set(fadeInItems, { opacity: 0, y: 30 }); // 初期状態を設定
    gsap.to(fadeInItems, {
      scrollTrigger: {
        trigger: fadeIn,
        start: 'top 80%',
        once: true,
      },
      opacity: 1,
      y: 0,
      duration: 0.5,
      delay: 0.2,
      ease: 'power2.out',
      stagger: 0.05,
    });
  });

  // bodyにhomeクラスがある場合
  const body = document.body;
  const hd = document.querySelector('.hd');
  if (body.classList.contains('home')) {
    console.log('Home page detected');
    const tl = gsap.timeline();
    // 初期値
    gsap.set('.kv-ttl', {
      y: 30,
      opacity: 0,
    })
    gsap.set('.kv-sub', {
      y: 30,
      opacity: 0,
    });

    // アニメーション
    tl.to('.kv-bg', {
      duration: 1,
      onStart: () => {
        document.querySelector('.kv-bg')?.classList.add('is-visible');
      }
    });
    tl.to(hd, {
      y: 0,
      opacity: 1,
      duration: 0.5,
      ease: 'power2.out',
      onStart: () => {
        document.querySelectorAll('.bl-img')?.forEach(img => img.classList.add('is-visible'));
      }
    });
    tl.to('.kv-ttl', {
      y: 0,
      opacity: 1,
      duration: 0.6,
      ease: 'power2.out',
    }, '-=0.4');
    tl.to('.kv-sub', {
      y: 0,
      opacity: 1,
      duration: 0.6,
      ease: 'power2.out',
    }, '-=0.5');
    tl.to('.bl-lead', {
      y: 0,
      opacity: 1,
      duration: 0.6,
      ease: 'power2.out',
      onStart: () => {
        document.querySelector('.bl-lead')?.classList.add('is-visible');
      }
    });
  } else {
    const tl = gsap.timeline();
    const h1En = document.querySelector('.page-ttl-en');
    const h1Ja = document.querySelector('.page-ttl-ja');
    const pageCont = document.querySelector('.page-cont');
    gsap.to(pageCont, {
      toggleClass: 'is-visible',
    });
    tl.to(h1En, {
      y: 0,
      opacity: 1,
      duration: 0.6,
      ease: 'power2.out',
    });
    tl.to(h1Ja, {
      y: 0,
      opacity: 1,
      duration: 0.6,
      ease: 'power2.out',
    }, '-=0.4');
  }
}

document.addEventListener('DOMContentLoaded', () => {
  menuToggle();
  emblaInit();
  accordionToggle();
  hashChange();
  gsapAnimation();
});