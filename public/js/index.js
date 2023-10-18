function Slider(els, opts = {}) {
    var position,
        action = 0;

    return new(function() {
        this.wrap = typeof els.wrap === "string" ? document.querySelector(els.wrap) : els.wrap;
        this.list = this.wrap.querySelector("ul");
        this.wrap.style.overflow = "hidden";
        this.list.style.display = "flex";
        this.current = {
            value: 0,
        };

        this.update = (opt = {}) => {
            opts = {
                ...opts,
                ...opt,
            };
            this.infinite = opts.infinite || false;
            this.vert = opts.vert || false;
            this.auto = opts.auto || false;
            this.size = opts.size || false;
            this.flip = opts.flip || false;
            this.touch = opts.touch || false;
            this.time = opts.time || 5000;
            this.move = opts.move || 1;
            this.cols = opts.cols || 1;
            this.gap = opts.gap || 0;

            if (this.infinite) {
                Array.from(this.list.children).forEach((e) => e.isCloned && e.remove());

                const len = this.list.children.length;
                const firsts = Array.from(this.list.children).reduce((a, e, i) => {
                    if (i < this.cols) {
                        const x = e.cloneNode(true);
                        x.setAttribute("x-clone", "");
                        a.push(x);
                    }
                    return a;
                }, []);
                const lasts = Array.from(this.list.children).reduce((a, e, i) => {
                    if (i > len - this.cols - 1) {
                        const x = e.cloneNode(true);
                        x.setAttribute("x-clone", "");
                        a.push(x);
                    }
                    return a;
                }, []);

                if (firsts.length) {
                    for (let i = 0; i < this.cols; i++) {
                        const current = firsts[i];
                        this.list.insertAdjacentElement("beforeend", current);
                        current.isCloned = true;
                    }
                }

                if (lasts.length) {
                    for (let i = this.cols; i > 0; i--) {
                        const current = lasts[i - 1];
                        this.list.insertAdjacentElement("afterbegin", current);
                        current.isCloned = true;
                    }
                }
            }

            this.items = Array.from(this.list.children);
            this.length = this.items.length;

            this.__opt = this.vert ? {
                size: "clientHeight",
                item: "height",
                scroll: "scrollTop",
                pos: "clientY",
            } : {
                size: "clientWidth",
                item: "width",
                scroll: "scrollLeft",
                pos: "clientX",
            };

            this.size && (this.wrap.style[this.__opt.item] = this.size * this.cols + this.gap * (this.cols - 1) + "px");
            this.size && (this.wrap.style[this.__opt.size] = this.size * this.cols + this.gap * (this.cols - 1) + "px");

            this.list.style.width = "";
            this.list.style.flexDirection = "";
            this.list.style.width = "";
            this.list.style.height = "";

            this.vert ?
                ((this.list.style.width = "100%"), (this.list.style.flexDirection = "column")) :
                ((this.list.style.width = "max-content"), (this.list.style.height = "100%"));

            this.itemSize = this.wrap[this.__opt.size] / this.cols - (this.gap * (this.cols - 1)) / this.cols;
            this.scrollLength = this.itemSize + this.gap;
            this.list.style.gap = this.gap + "px";

            for (let i = 0; i < this.length; i++) {
                this.items[i].style = "";
                this.items[i].style[this.__opt.item] = this.itemSize + "px";
            }
            if (!this.__isLunched && this.current.value === 0) {
                this.current.value = this.cols * this.move;
                window.onresize = this.update;
                this.__isLunched = true;
            }

            this.wrap.style.scrollBehavior = "unset";
            this.wrap[this.__opt.scroll] = this.scrollLength * this.current.value;
            this.wrap.style.scrollBehavior = "smooth";

            this.update.__auto && this.update.__auto();
            this.update.__touch && this.update.__touch();
        };

        this.update.__auto = () => {
            if (this.auto) {
                const repeatOften = () => {
                    clearTimeout(this.__timer);
                    this.__timer = setTimeout(() => {
                        this.flip ? this.scrollPrev() : this.scrollNext();
                        requestAnimationFrame(repeatOften);
                    }, this.time);
                };
                requestAnimationFrame(repeatOften);
            }
        };

        this.update.__touch = () => {
            if (this.touch) {
                this.wrap.onpointerdown = (e) => {
                    e.preventDefault();
                    if (action == 0) {
                        action = 1;
                        position = e[this.__opt.pos];
                    }
                    this.wrap.onpointermove = (e) => {
                        e.preventDefault();
                        var fn;
                        if (e[this.__opt.pos] > position) fn = this.scrollPrev;
                        if (e[this.__opt.pos] < position) fn = this.scrollNext;
                        if (action == 1) {
                            action = 2;
                            if (fn) {
                                this.update.__auto();
                                fn();
                            }
                        }
                    };
                    this.wrap.onpointerup = (e) => {
                        e.preventDefault();
                        if (action == 2) action = 0;
                        this.wrap.onpointermove = null;
                        this.wrap.onpointerup = null;
                    };
                };
            } else this.wrap.onpointerdown = null;
        };

        this.update();

        this.scroll = () => {
            this.wrap[this.__opt.scroll] = this.scrollLength * this.current.value;
        };

        this.scrollTo = (idx) => {
            this.current.value = idx;
            this.scroll();
        };

        this.scrollNext = () => {
            if (this.current.value >= this.length - this.cols) {
                if (this.infinite) {
                    this.wrap.style.scrollBehavior = "unset";
                    this.current.value = this.cols;
                    this.scroll();
                    this.current.value += this.move;
                    this.wrap.style.scrollBehavior = "smooth";
                } else this.current.value = 0;
            } else this.current.value += this.move;
            this.scroll();
        };

        this.scrollPrev = () => {
            if (this.current.value <= 0) {
                if (this.infinite) {
                    this.wrap.style.scrollBehavior = "unset";
                    this.current.value = this.length - this.cols - this.cols;
                    this.scroll();
                    this.current.value -= this.move;
                    this.wrap.style.scrollBehavior = "smooth";
                } else this.current.value = this.length - this.cols;
            } else this.current.value -= this.move;
            this.scroll();
        };

        this.resize = (fn_true = () => {}, fn_false = () => {}, condistion = "(min-width: 1024px)") => {
            const fn = () => {
                if (window.matchMedia(condistion).matches) fn_true();
                else fn_false();
            };
            window.addEventListener("resize", fn);
            fn();
        };

        if (els.prev) {
            this.prev = typeof els.prev === "string" ? document.querySelector(els.prev) : els.prev;
            this.prev.addEventListener("click", () => {
                this.update.__auto();
                this.scrollPrev();
            });
        }

        if (els.next) {
            this.next = typeof els.next === "string" ? document.querySelector(els.next) : els.next;
            this.next.addEventListener("click", () => {
                this.update.__auto();
                this.scrollNext();
            });
        }

        this.update.__auto();
        this.update.__touch();
    })();
}

function MainSlider() {
    const main = new Slider({
        wrap: "#main-slider",
    }, {
        infinite: true,
        time: 10000,
        vert: true,
        auto: true,
        gap: 0,
    });

    window.addEventListener("resize", main.update);
}

let currentSlide = 0;

function AnimateSlider() {
    const modal = document.querySelector("#modal");
    const close = document.querySelector("#close");

    close.addEventListener("click", (e) => {
        modal.classList.remove("opacity-100");
        modal.classList.add("opacity-0", "pointer-events-none");
    });

    let next = document.querySelector("#next");
    let prev = document.querySelector("#prev");

    prev.onclick = function() {
        AnimateSlider.changeSlide(currentSlide - 1);
    };

    next.onclick = function() {
        AnimateSlider.changeSlide(currentSlide + 1);
    };
}

AnimateSlider.changeSlide = function(moveTo) {
    const slides = document.querySelectorAll("#slider > li");
    if (moveTo >= slides.length) {
        moveTo = 0;
    }
    if (moveTo < 0) {
        moveTo = slides.length - 1;
    }
    slides[currentSlide].classList.add("opacity-0");
    slides[moveTo].classList.remove("opacity-0");
    currentSlide = moveTo;
}

function ShowSlider(e) {
    const modal = document.querySelector("#modal");
    const list = document.querySelector("#slider");
    list.innerHTML = "";

    const items = [...e.target.parentElement.children];
    items.forEach((item, i) => {
        list.innerHTML += `
            <li class="absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-300 overflow-hidden">
                <img src="${item.src}" class="w-full h-full object-cover brightness-[.3] absolute inset-0 z-[-1]" />
                <img src="${item.src}" class="w-full h-auto lg:w-auto lg:h-full max-w-full max-h-full object-cover" />
            </li>
        `;
    });
    modal.classList.add("opacity-100");
    modal.classList.remove("opacity-0", "pointer-events-none");
    AnimateSlider.changeSlide(+e.target.dataset.idx);
}

function UploadAction(
    fn = (e) => {
        if (e.target.files.length) e.target.parentElement.submit();
    }
) {
    const _upload = document.querySelector("#upload"),
        _uploadForm = document.querySelector("#uploadForm"),
        _file = _uploadForm.querySelector("#file");

    _upload.addEventListener("click", () => {
        _file.click();
    });

    _file.addEventListener("change", fn);
}

function DeleteAction() {
    const _delete = document.querySelector("#delete"),
        _deleteForm = document.querySelector("#deleteForm");
    _delete.addEventListener("click", () => {
        _deleteForm.submit();
    });
}

function ShowDeleteButton() {
    const _list = document.querySelectorAll(".check:checked"),
        _delete = document.querySelector("#delete");
    if (_list.length) _delete.classList.remove("hidden");
    else _delete.classList.add("hidden");
}

function Calculate(e) {
    e.preventDefault();
    const display = document.querySelector("#price");
    const price = +e.target.elements["filter"].value;
    const size = +e.target.elements["width"].value * +e.target.elements["heigth"].value;
    let total = price * size;
    let decimalPart = total.toString().split('.');
   if (decimalPart[1].length < 3) {
        decimalPart[1] = decimalPart[1] + "0";
    } else {
        decimalPart[1] = decimalPart[1].substring(0, 3);
    }
    display.innerHTML = `${decimalPart.join(".")}KD`;
}