const x = {
    fns: {},
    Capitalize() {
        // select all the elements with the selector
        var targets = document.querySelectorAll(`[${x.Capitalize.options.Attributes.Selector}]`);

        // add join elements arrays if exist
        if (x.Capitalize.options.Elements.length) targets = [...targets, ...x.Capitalize.options.Elements];

        // return if no targets exist
        if (!targets.length) return this;

        // loop through all the targets
        for (let i = 0; i < targets.length; i++) {
            // set the current target
            const current = targets[i];

            // check if the element is a text field
            var property = "textContent";
            if (["INPUT", "TEXTAREA"].includes(current.tagName)) property = "value";

            // get the current text of element
            const text = (current[property] || "").trim();

            // set the capitalize back to text
            current[property] = text.length ? text[0].toUpperCase() + text.slice(1) : text;

            // remove all the attributes
            current.removeAttribute(x.Capitalize.options.Attributes.Selector);
        }

        // return self after end
        return this;
    },
    Toggle() {
        // select all the elements with the selector
        var targets = document.querySelectorAll(`[${x.Toggle.options.Attributes.Selector}]`);

        // add join elements arrays if exist
        if (x.Toggle.options.Elements.length) targets = [...targets, ...x.Toggle.options.Elements];

        // return if no targets exist
        if (!targets.length) return this;

        // loop through all the targets
        for (let i = 0; i < targets.length; i++) {
            // set the current target
            const current = targets[i];

            // split all targets selectors and return if no one found
            const selectors = (current.getAttribute(x.Toggle.options.Attributes.Targets) || "").split(",");
            if (!selectors.length) continue;

            // set a dictionary
            const map = {
                properties: ((current.getAttribute(x.Toggle.options.Attributes.Properties) || "").split(",") || []).map(e => e.trim()),
                targets: [],
            };

            // loop all the selectors and get all the targets elements
            for (let j = 0; j < selectors.length; j++) {
                const selector = selectors[j].trim();
                const elements = document.querySelectorAll(selector);
                if (!elements.length) continue;
                map.targets = [...map.targets, ...elements];
            }

            // add the vent listener
            current.addEventListener("click", () => {
                // loop through all the targets
                for (let j = 0; j < map.targets.length; j++) {
                    const target = map.targets[j];

                    // loop through all the properties
                    for (let k = 0; k < map.properties.length; k++) {
                        const property = map.properties[k].split(":");

                        // check if is it an attributes or class
                        if (property[0] === "attr") {
                            const attribute = property[1];
                            if (target.hasAttribute(attribute)) target.removeAttribute(attribute);
                            else target.setAttribute(attribute, "");
                        } else {
                            const classname = property.length > 1 ? property[1] : property[0];
                            target.classList.toggle(classname);
                        }
                    }
                }
            });

            // remove all the attributes
            current.removeAttribute(x.Toggle.options.Attributes.Targets);
            current.removeAttribute(x.Toggle.options.Attributes.Selector);
            current.removeAttribute(x.Toggle.options.Attributes.Properties);
        }

        // return self after end
        return this;
    },
    Icon() {
        // select all the elements with the selector
        var targets = document.querySelectorAll(`[${x.Icon.options.Attributes.Selector}]`);

        // add join elements arrays if exist
        if (x.Icon.options.Elements.length) targets = [...targets, ...x.Icon.options.Elements];

        // return if no targets exist
        if (!targets.length) return this;

        const template = `<div class="xi-content-container flex w-full h-full items-center p-2 pe-10 border border-gray-200 bg-[#fcfcfc] rounded-md text-base text-gray-950 cursor-text"></div><div class="xi-icon-container pointer-events-none w-full absolute top-0 left-0 bottom-0 right-0 p-2 flex items-center"><div class="xi-icon-holder flex items-center justify-center w-6 h-6 rounded-md pointer-events-auto ms-auto"></div></div>`;

        // loop through all the targets
        for (let i = 0; i < targets.length; i++) {
            const current = targets[i];
            const target = document.querySelector(current.getAttribute(x.Icon.options.Attributes.Target));

            // create a div wrapper and add the calsses and template
            const wrapper = document.createElement("div");
            wrapper.classList.add("xi-container", "relative", "rounded-md", "focus-within:outline", "focus-within:outline-2", "focus-within:-outline-offset-2", "focus-within:outline-blue-400");
            current.className = "flex-1 outline-none bg-transparent";
            wrapper.innerHTML = template;

            // select and creaate the nessary elements
            const content = wrapper.querySelector(".xi-content-container");
            const wrap = wrapper.querySelector(".xi-icon-holder");

            // add actions
            ["focus", "click"].forEach(e => {
                content.addEventListener(e, () => current.focus());
            });

            // append the template after the select
            current.insertAdjacentElement("afterend", wrapper);
            content.appendChild(current);
            if (target) wrap.appendChild(target);

            // remove all the attributes
            current.removeAttribute(x.Icon.options.Attributes.Selector);
        }

        // return self after end
        return this;
    },
    Switch() {
        // select all the elements with the selector
        var targets = document.querySelectorAll(`[${x.Switch.options.Attributes.Selector}]`);

        // add join elements arrays if exist
        if (x.Switch.options.Elements.length) targets = [...targets, ...x.Switch.options.Elements];

        // return if no targets exist
        if (!targets.length) return this;

        const template = `<label class="xsw-content w-max flex items-center gap-2"><span class="xsw-label block text-base text-gray-950"></span></label>`;

        // loop through all the targets
        for (let i = 0; i < targets.length; i++) {
            const current = targets[i];

            // create a div wrapper and add the calsses and template
            const wrapper = document.createElement("div");
            wrapper.classList.add("xsw-container", "relative");
            wrapper.innerHTML = template;

            current.className = x.Switch.options.ClassNames.Input;

            // select and creaate the nessary elements
            const content = wrapper.querySelector(".xsw-content");
            const label = wrapper.querySelector(".xsw-label");

            content.for = current.id;

            // add actions
            current.addEventListener("keydown", (e) => {
                e.keyCode === 13 && (e.target.checked = !e.target.checked)
            });

            const fn = (function fn() {
                if ((current.getAttribute(x.Switch.options.Attributes.Label) || "").trim().length) {
                    label.classList.remove("hidden");
                    label.innerHTML = current.getAttribute(x.Switch.options.Attributes.Label);
                } else label.classList.add("hidden");
                return fn
            })();

            (new MutationObserver(mutationsList => {
                for (let mutation of mutationsList) {
                    if (mutation.type === "attributes") {
                        if (mutation.attributeName === x.Switch.options.Attributes.Label) {
                            fn();
                        }
                    }
                }
            })).observe(current, {
                attributes: true,
                attributeFilter: [x.Switch.options.Attributes.Label]
            });

            // append the template after the select
            current.insertAdjacentElement("afterend", wrapper);
            content.insertAdjacentElement("afterbegin", current);

            // remove all the attributes
            current.removeAttribute(x.Icon.options.Attributes.Selector);
        }

        // return self after end
        return this;
    },
    Password() {
        // select all the elements with the selector
        var targets = document.querySelectorAll(`[${x.Password.options.Attributes.Selector}]`);

        // add join elements arrays if exist
        if (x.Password.options.Elements.length) targets = [...targets, ...x.Password.options.Elements];

        // return if no targets exist
        if (!targets.length) return this;

        const template = `<div class="xp-content-container flex w-full h-full items-center p-2 pe-10 border border-gray-200 bg-[#fcfcfc] rounded-md text-base text-gray-950 cursor-text"></div><div class="xp-trigger-container pointer-events-none w-full absolute top-0 left-0 bottom-0 right-0 p-2 flex items-center"><button type="button" aria-label="trigger-button" class="xp-trigger flex items-center justify-center w-6 h-6 hover:bg-gray-300 focus:bg-gray-300 hover:bg-opacity-50 focus:bg-opacity-50 outline-none cursor-pointer rounded-md pointer-events-auto ms-auto"><svg class="xp-trigger-icon block pointer-events-none text-gray-950 w-4 h-4" fill="currentColor" viewBox="0 -960 960 960"><path class="xp-icon-on" d="M480.294-333Q550-333 598.5-381.794t48.5-118.5Q647-570 598.206-618.5t-118.5-48.5Q410-667 361.5-618.206t-48.5 118.5Q313-430 361.794-381.5t118.5 48.5Zm-.412-71q-39.465 0-67.674-28.326Q384-460.652 384-500.118q0-39.465 28.326-67.674Q440.652-596 480.118-596q39.465 0 67.674 28.326Q576-539.348 576-499.882q0 39.465-28.326 67.674Q519.348-404 479.882-404ZM480-180q-143.61 0-260.805-79T37.145-467.077q-3.945-5.987-6.045-14.901-2.1-8.915-2.1-17.824 0-8.909 2.1-18.178 2.1-9.27 6.045-16.943 64.834-126.779 182.04-205.928Q336.39-820 480-820t260.815 79.149q117.206 79.149 182.04 205.928 3.945 7.673 6.045 16.588 2.1 8.914 2.1 17.823t-2.1 18.179q-2.1 9.269-6.045 15.256Q858-338 740.805-259 623.61-180 480-180Z"/><path class="xp-icon-off hidden" d="M780-286 632-434q8-12 11.5-31t3.5-35q0-70-48.5-118.5T480-667q-17 0-33 3.5T414-652L286-781q34-14 90.5-26.5T485-820q136 0 255.5 75.5T925-535q3 8 4.5 17t1.5 18q0 9-1.5 18.5T924-466q-27 56-64 100.5T780-286Zm2 200L653-211q-35 14-79.5 22.5T480-180q-141 0-259.5-75.5T36-467q-4-7-5.5-15.5T29-500q0-9 2-19t5-17q21-43 53.5-85t73.5-82l-97-98q-10-8-10-22.5T66-848q8-9 23-9t25 9l716 716q9 10 7.5 23.5T830-87q-11 11-25.5 11T782-86ZM480-333q12 0 24.5-3t20.5-6L320-545q-2 10-4.5 22t-2.5 23q0 71 49 119t118 48Zm82-172-72-72q27-18 59 7t13 65Z"/></svg></button></div>`;

        // loop through all the targets
        for (let i = 0; i < targets.length; i++) {
            const current = targets[i];

            // create a div wrapper and add the calsses and template
            const wrapper = document.createElement("div");
            wrapper.classList.add("xp-container", "relative", "rounded-md", "focus-within:outline", "focus-within:outline-2", "focus-within:-outline-offset-2", "focus-within:outline-blue-400");
            current.className = "flex-1 outline-none bg-transparent";
            wrapper.innerHTML = template;

            // select and creaate the nessary elements
            const content = wrapper.querySelector(".xp-content-container");
            const trigger = wrapper.querySelector(".xp-trigger");
            const open = wrapper.querySelector(".xp-icon-on");
            const close = wrapper.querySelector(".xp-icon-off");

            // add functionality to trigger
            trigger.addEventListener("click", e => {
                current.type = current.type == "password" ? "text" : "password";
                open.classList.toggle("hidden");
                close.classList.toggle("hidden");
            });

            // add actions
            ["focus", "click"].forEach(e => {
                content.addEventListener(e, () => current.focus());
            });

            // append the template after the select
            current.insertAdjacentElement("afterend", wrapper);
            content.appendChild(current);

            // remove all the attributes
            current.removeAttribute(x.Password.options.Attributes.Selector);
        }

        // return self after end
        return this;
    },
    Select() {
        // select all the elements with the selector
        var targets = document.querySelectorAll(`[${x.Select.options.Attributes.Selector}]`);

        // add join elements arrays if exist
        if (x.Select.options.Elements.length) targets = [...targets, ...x.Select.options.Elements];

        // return if no targets exist
        if (!targets.length) return this;

        const template = `<div class="xs-content-container flex w-full h-full items-center p-2 pe-10 border border-gray-200 bg-[#fcfcfc] rounded-md text-base text-gray-950 cursor-pointer"><div class="xs-content-scroller w-full overflow-auto no-scrollbar"><div class="xs-text w-max flex gap-1 items-center"></div></div></div><div class="xs-open-container pointer-events-none w-full absolute top-0 left-0 bottom-0 right-0 p-2 flex items-center"><button type="button" aria-label="open-button" class="xs-open flex items-center justify-center w-6 h-6 hover:bg-gray-300 focus:bg-gray-300 hover:bg-opacity-50 focus:bg-opacity-50 outline-none cursor-pointer rounded-md pointer-events-auto ms-auto"><svg class="xs-open-icon block pointer-events-none text-gray-950 w-4 h-4" fill="currentColor" viewBox="0 0 26 15"><path d="M12.9943 14.85C12.698 14.85 12.409 14.7909 12.1273 14.6727C11.8457 14.5545 11.6198 14.3803 11.4498 14.15L1.49983 4.3C1.09983 3.85833 0.908161 3.32292 0.924828 2.69375C0.941495 2.06458 1.14983 1.525 1.54983 1.075C2.04983 0.591667 2.59983 0.375 3.19983 0.425C3.79983 0.475 4.31649 0.7 4.74983 1.1L12.9998 9.35L21.2998 1.1C21.7165 0.666667 22.2457 0.441667 22.8873 0.425C23.529 0.408333 24.0665 0.640484 24.4998 1.12145C24.9665 1.56905 25.1832 2.11072 25.1498 2.74645C25.1165 3.38215 24.8832 3.9 24.4498 4.3L14.5998 14.15C14.3943 14.3803 14.1494 14.5545 13.8651 14.6727C13.5809 14.7909 13.2906 14.85 12.9943 14.85Z"/></svg></button></div><div class="xs-modal backdrop-blur-sm fixed inset-0 bg-gray-950 bg-opacity-50 z-50 flex items-end justify-center lg:absolute lg:inset-auto lg:left-0 lg:right-0 lg:top-full lg:mt-1 lg:rounded-md lg:border lg:border-gray-200 lg:min-w-[18rem]  lg:bg-transparent !hidden"><div class="xs-overflow-hidden bg-white w-full overflow-hidden rounded-t-md lg:rounded-md"><div class="xs-items-container w-full flex flex-col max-h-custom lg:max-h-[300px] h-auto overflow-auto"><div class="xs-search-container w-full bg-white p-2 pb-1 sticky top-0"><input type="search" placeholder="Search..." class="xs-search appearance-none rounded-md w-full px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950" /></div><ul class="xs-items flex flex-col w-full flex-1"></ul></div></div></div>`;


        x.Select._chosen = document.createElement("span");
        x.Select._label = document.createElement("span");
        x.Select._group = document.createElement("li");
        x.Select._item = document.createElement("li");
        x.Select._chosen.className = x.Select.options.ClassNames.Chosen;
        x.Select._label.className = x.Select.options.ClassNames.Label;
        x.Select._group.className = x.Select.options.ClassNames.Group;
        x.Select._item.className = x.Select.options.ClassNames.Item;
        x.Select._group.innerHTML = x.Select.options.GroupSymbol;
        x.Select._label.innerHTML = x.Select.options.Empty;

        // loop through all the targets
        for (let i = 0; i < targets.length; i++) {
            const current = targets[i];

            // set the selected index to none
            current.selectedIndex = -1;

            // add default object needed after
            current.xs = {
                data: [],
                name: current.name,
                multiple: current.hasAttribute(x.Select.options.Attributes.Multiple),
                max: parseInt(current.getAttribute(x.Select.options.Attributes.Max)),
            }

            // remove the name from select if multiple select
            if (current.hasAttribute(x.Select.options.Attributes.Multiple)) {
                current.removeAttribute("name");
            }

            // hide the select
            current.classList.add("hidden");

            // create a div wrapper and add the calsses and template
            const wrapper = document.createElement("div");
            wrapper.classList.add("xs-container", "relative", "rounded-md", "focus-within:outline", "focus-within:outline-2", "focus-within:-outline-offset-2", "focus-within:outline-blue-400");
            wrapper.innerHTML = template;

            // select and creaate the nessary elements
            const content = wrapper.querySelector(".xs-content-container");
            const search = wrapper.querySelector(".xs-search");
            const text = wrapper.querySelector(".xs-text");
            const modal = wrapper.querySelector(".xs-modal");
            const open = wrapper.querySelector(".xs-open");
            const items = wrapper.querySelector(".xs-items-container");
            const list = wrapper.querySelector(".xs-items");
            const label = x.Select._label.cloneNode(true);
            text.append(label);

            // set the labal if the place holder exist
            if (current.attributes[x.Select.options.Attributes.Placeholder] && current.attributes[x.Select.options.Attributes.Placeholder].value.trim().length) {
                label.innerHTML = current.attributes[x.Select.options.Attributes.Placeholder].value.trim();
            }

            // add the trigger events to elements
            [current, content].forEach(el => el.addEventListener("click", () => {
                open.click();
            }));

            // add the search fields event
            search.addEventListener("input", e => {
                const filter = e.target.value.toUpperCase().trim();
                for (let item of list.querySelectorAll("li:not(.xs-group)")) {
                    const phrase = item.innerText.toUpperCase().trim();
                    for (const niddle of filter.split(" ")) {
                        if (phrase.includes(niddle)) item.classList.remove("hidden");
                        else item.classList.add("hidden");
                    }
                }
            });

            // blur search when search click 
            search.addEventListener("search", e => {
                search.blur();
            });

            // add the trigger events to elements
            open.addEventListener("click", (e) => {
                e.preventDefault();
                x.Select._toggle(current, modal, search, list);
            });

            // Add a click event listener to the outer div
            modal.addEventListener('click', (e) => {
                // Check if the clicked element is the outer div itself
                if (e.target === modal && !modal.classList.contains("!hidden")) {
                    x.Select._toggle(current, modal, search, list);
                }
            });

            // Add a click event listener to the inner div
            items.addEventListener('click', (e) => {
                // Prevent the click event from bubbling up to the outer div
                e.stopPropagation();
            });

            // hide the div when click outside
            window.addEventListener("click", function(e) {
                if (!wrapper.contains(e.target) && !modal.classList.contains("!hidden")) {
                    x.Select._toggle(current, modal, search, list);
                }
            });

            // rexecute if the select html changes
            (new MutationObserver(() => {
                x.Select._init(current, text, wrapper, modal, items, search, list);
            })).observe(current, {
                childList: true,
                subtree: true,
                attributes: true,
            });

            // add style if disabled
            const fn = (function fn() {
                if (current.hasAttribute(x.Select.options.Attributes.Disabled)) {
                    wrapper.classList.add("opacity-80", "xdp-disabled");
                } else {
                    wrapper.classList.remove("opacity-80", "xdp-disabled");
                }
                return fn;
            })()

            // check the disabled of the datepicker
            const disabledObserver = new MutationObserver(mutationsList => {
                for (let mutation of mutationsList) {
                    if (mutation.type === "attributes") {
                        if (mutation.attributeName === x.Select.options.Attributes.Disabled) {
                            fn();
                        }
                        if (mutation.attributeName === x.Select.options.Attributes.Max) {
                            current.xs.max = parseInt(current.getAttribute(x.Select.options.Attributes.Max))
                        }
                    }
                }
            });
            disabledObserver.observe(current, {
                attributes: true,
                attributeFilter: [x.Select.options.Attributes.Disabled, x.Select.options.Attributes.Max]
            });

            // add resize to remove scroll from body on mobile and add it on pc
            window.addEventListener("resize", () => {
                if (current.xs.status === "open") {
                    if (!matchMedia("(min-width: 1024px)").matches) document.body.classList.add("!overflow-hidden", "!h-screen");
                    else document.body.classList.remove("!overflow-hidden", "!h-screen");
                }
            });

            // init the select
            x.Select._init(current, text, wrapper, modal, items, search, list);

            // append the template after the select
            current.insertAdjacentElement("afterend", wrapper);

            // remove all the attributes
            current.removeAttribute(x.Select.options.Attributes.Selector);
            current.removeAttribute(x.Select.options.Attributes.Multiple);
        }

        // return self after end
        return this;
    },
    DatePicker() {
        // select all the elements with the selector
        var targets = document.querySelectorAll(`[${x.DatePicker.options.Attributes.Selector}]`);

        // add join elements arrays if exist
        if (x.DatePicker.options.Elements.length) targets = [...targets, ...x.DatePicker.options.Elements];

        // return if no targets exist
        if (!targets.length) return this;

        const template = `<div class="xdp-content-container flex w-full h-full items-center p-2 pe-10 border border-gray-200 bg-[#fcfcfc] rounded-md text-base text-gray-950 cursor-pointer"><div class="xdp-content-scroller w-full overflow-auto no-scrollbar"><div class="xdp-text w-max flex gap-1 items-center"></div></div></div><div class="xdp-open-container pointer-events-none w-full absolute top-0 left-0 bottom-0 right-0 p-2 flex items-center"><button type="button" aria-label="open-button" class="xdp-open flex items-center justify-center w-6 h-6 hover:bg-gray-300 focus:bg-gray-300 hover:bg-opacity-50 focus:bg-opacity-50 outline-none cursor-pointer rounded-md pointer-events-auto ms-auto"><svg class="xdp-open-icon block pointer-events-none text-gray-950 w-4 h-4" fill="currentColor" viewBox="0 -960 960 960"><path d="M190-58q-37.175 0-64.088-27.612Q99-113.225 99-149v-601q0-37.588 26.912-64.794Q152.825-842 190-842h59v-22q0-15.375 12.277-27.188Q273.554-903 288.877-903q17.148 0 28.136 11.812Q328-879.375 328-864v22h304v-22q0-15.375 11.577-27.188Q655.154-903 671.377-903q16.648 0 28.136 11.812Q711-879.375 711-864v22h59q37.588 0 64.794 27.206Q862-787.588 862-750v601q0 35.775-27.206 63.388Q807.588-58 770-58H190Zm0-91h580v-419H190v419Zm290.404-246q-18.822 0-32.113-13.177T435-439.877q0-18.523 13.379-31.823t32.2-13.3q18.821 0 31.621 13.177 12.8 13.177 12.8 31.7T512.112-408.3Q499.225-395 480.404-395Zm-160.281 0q-18.523 0-31.823-13.177t-13.3-31.7q0-18.523 13.177-31.823t31.7-13.3q18.523 0 31.823 13.177t13.3 31.7q0 18.523-13.177 31.823t-31.7 13.3Zm319.298 0Q622-395 608.5-408.177t-13.5-31.7q0-18.523 13.588-31.823 13.587-13.3 31.508-13.3 17.922 0 31.413 13.177t13.491 31.7q0 18.523-13.379 31.823t-32.2 13.3ZM480.404-235q-18.822 0-32.113-13.588Q435-262.175 435-280.096q0-17.922 13.379-31.413t32.2-13.491q18.821 0 31.621 13.379 12.8 13.379 12.8 32.2Q525-262 512.112-248.5 499.225-235 480.404-235Zm-160.281 0q-18.523 0-31.823-13.588-13.3-13.587-13.3-31.508 0-17.922 13.177-31.413t31.7-13.491q18.523 0 31.823 13.379t13.3 32.2Q365-262 351.823-248.5t-31.7 13.5Zm319.298 0Q622-235 608.5-248.588 595-262.175 595-280.096q0-17.922 13.588-31.413Q622.175-325 640.096-325q17.922 0 31.413 13.379t13.491 32.2Q685-262 671.621-248.5t-32.2 13.5Z"/></svg></button></div><div class="xdp-modal backdrop-blur-sm fixed inset-0 bg-gray-950 bg-opacity-50 z-50 flex items-end justify-center lg:absolute lg:inset-auto lg:left-0 lg:right-0 lg:top-full lg:mt-1 lg:rounded-md lg:border lg:border-gray-200 lg:min-w-[18rem] lg:bg-transparent !hidden"><div class="xdp-calendar w-full bg-white flex flex-col rounded-t-md lg:rounded-md overflow-hidden"><div class="xdp-controls w-full p-2 flex gap-2 items-center bg-blue-400"><button type="button" aria-label="arrow-button-prev" class="xdp-arrow xdp-arrow-prev flex w-10 h-10 items-center justify-center text-gray-50 hover:bg-gray-50 focus:bg-gray-50 hover:bg-opacity-20 focus:bg-opacity-20 outline-none cursor-pointer rounded-md rtl:rotate-180"><svg class="xdp-arrow-icon block pointer-events-none text-gray-50 w-8 h-8" fill="currentColor" viewBox="0 -960 960 960"><path d="M528-251 331-449q-7-6-10.5-14t-3.5-18q0-9 3.5-17.5T331-513l198-199q13-12 32-12t33 12q13 13 12.5 33T593-646L428-481l166 166q13 13 13 32t-13 32q-14 13-33.5 13T528-251Z"/></svg></button><h1 class="xdp-date-display font-black text-xl text-center flex-1 text-gray-50"></h1><button type="button" aria-label="arrow-button-next" class="xdp-arrow xdp-arrow-next flex w-10 h-10 items-center justify-center text-gray-50 hover:bg-gray-50 focus:bg-gray-50 hover:bg-opacity-20 focus:bg-opacity-20 outline-none cursor-pointer rounded-md rtl:-rotate-180"><svg class="xdp-arrow-icon block pointer-events-none text-gray-50 w-8 h-8" fill="currentColor" viewBox="0 -960 960 960"><path d="M344-251q-14-15-14-33.5t14-31.5l164-165-165-166q-14-12-13.5-32t14.5-33q13-14 31.5-13.5T407-712l199 199q6 6 10 14.5t4 17.5q0 10-4 18t-10 14L408-251q-13 13-32 12.5T344-251Z"/></svg></button></div><ul class="xdp-days w-full px-2 grid gap-2 lg:gap-0 grid-rows-1 grid-cols-7 bg-blue-400"><li class="xdp-day w-full flex items-center justify-center rounded-md text-gray-50 font-bold text-xs lg:text-[.8rem]">${x.DatePicker._string(x.DatePicker.options.Data.WeekDays[0], x.DatePicker.options.Data.ShowFullWeekDay)}</li><li class="xdp-day w-full flex items-center justify-center rounded-md text-gray-50 font-bold text-xs lg:text-[.8rem]">${x.DatePicker._string(x.DatePicker.options.Data.WeekDays[1], x.DatePicker.options.Data.ShowFullWeekDay)}</li><li class="xdp-day w-full flex items-center justify-center rounded-md text-gray-50 font-bold text-xs lg:text-[.8rem]">${x.DatePicker._string(x.DatePicker.options.Data.WeekDays[2], x.DatePicker.options.Data.ShowFullWeekDay)}</li><li class="xdp-day w-full flex items-center justify-center rounded-md text-gray-50 font-bold text-xs lg:text-[.8rem]">${x.DatePicker._string(x.DatePicker.options.Data.WeekDays[3], x.DatePicker.options.Data.ShowFullWeekDay)}</li><li class="xdp-day w-full flex items-center justify-center rounded-md text-gray-50 font-bold text-xs lg:text-[.8rem]">${x.DatePicker._string(x.DatePicker.options.Data.WeekDays[4], x.DatePicker.options.Data.ShowFullWeekDay)}</li><li class="xdp-day w-full flex items-center justify-center rounded-md text-gray-50 font-bold text-xs lg:text-[.8rem]">${x.DatePicker._string(x.DatePicker.options.Data.WeekDays[5], x.DatePicker.options.Data.ShowFullWeekDay)}</li><li class="xdp-day w-full flex items-center justify-center rounded-md text-gray-50 font-bold text-xs lg:text-[.8rem]">${x.DatePicker._string(x.DatePicker.options.Data.WeekDays[6], x.DatePicker.options.Data.ShowFullWeekDay)}</li></ul><ul class="xdp-dates w-full p-2 lg:p-1 grid gap-2 lg:gap-0 grid-rows-1 grid-cols-7"></ul></div></div>`;
        x.DatePicker._label = document.createElement("span");
        x.DatePicker._date = document.createElement("li");
        x.DatePicker._label.className = x.DatePicker.options.ClassNames.Label;
        x.DatePicker._date.className = x.DatePicker.options.ClassNames.Date;
        x.DatePicker._label.innerHTML = x.DatePicker.options.Empty;

        function getArray(string) {
            return (string || "").split(",").map(e => e.trim()).filter(e => e.length);
        }

        // loop through all the targets
        for (let i = 0; i < targets.length; i++) {
            const current = targets[i];

            // add default object needed after
            current.xdp = {
                date: new Date(),
                disabledDates: getArray(current.getAttribute(x.DatePicker.options.Attributes.DisabledDates)),
                disabledDays: getArray(current.getAttribute(x.DatePicker.options.Attributes.DisabledDays)),
            }

            // hide the datepicker
            current.classList.add("hidden");

            // create a div wrapper and add the calsses and template
            const wrapper = document.createElement("div");
            wrapper.classList.add("xdp-container", "relative", "rounded-md", "focus-within:outline", "focus-within:outline-2", "focus-within:-outline-offset-2", "focus-within:outline-blue-400");
            wrapper.innerHTML = template;

            // select and creaate the nessary elements
            const content = wrapper.querySelector(".xdp-content-container");
            const text = wrapper.querySelector(".xdp-text");
            const modal = wrapper.querySelector(".xdp-modal");
            const open = wrapper.querySelector(".xdp-open");
            const wrap = wrapper.querySelector(".xdp-calendar");
            const next = wrapper.querySelector(".xdp-arrow-next");
            const prev = wrapper.querySelector(".xdp-arrow-prev");
            const display = wrapper.querySelector(".xdp-date-display");
            const dates = wrapper.querySelector(".xdp-dates");
            const label = x.DatePicker._label.cloneNode(true);
            text.append(label);


            // set the labal if the place holder exist
            if (current.attributes[x.DatePicker.options.Attributes.Placeholder] && current.attributes[x.DatePicker.options.Attributes.Placeholder].value.trim().length) {
                label.innerHTML = current.attributes[x.DatePicker.options.Attributes.Placeholder].value.trim();
            }

            // add the trigger events to elements
            [current, content].forEach(el => el.addEventListener("click", () => {
                open.click();
            }));

            // add the trigger to prev arrow
            prev.addEventListener("click", e => {
                e.preventDefault();
                current.xdp.date.setMonth(current.xdp.date.getMonth() - 1);
                x.DatePicker._init(current, text, modal, display, dates);
            });

            // add the trigger to next arrow
            next.addEventListener("click", e => {
                e.preventDefault();
                current.xdp.date.setMonth(current.xdp.date.getMonth() + 1);
                x.DatePicker._init(current, text, modal, display, dates);
            });

            // add the trigger events to elements
            open.addEventListener("click", (e) => {
                e.preventDefault();
                x.DatePicker._toggle(current, modal);
            });

            // Add a click event listener to the outer div
            modal.addEventListener('click', (e) => {
                // Check if the clicked element is the outer div itself
                if (e.target === modal && !modal.classList.contains("!hidden")) {
                    x.DatePicker._toggle(current, modal);
                }
            });

            // Add a click event listener to the inner div
            wrap.addEventListener('click', (e) => {
                // Prevent the click event from bubbling up to the outer div
                e.stopPropagation();
            });

            // hide the div when click outside
            window.addEventListener("click", function(e) {
                if (!wrapper.contains(e.target) && !modal.classList.contains("!hidden")) {
                    x.DatePicker._toggle(current, modal);
                }
            });

            // create observers to observe attributes changes
            function Observer(...attributes) {
                const observer = new MutationObserver(mutationsList => {
                    for (let mutation of mutationsList) {
                        if (mutation.type === "attributes" && attributes.includes(mutation.attributeName)) {
                            const date = x.DatePicker._format(new Date(current.getAttribute("value"))).split("-");
                            current.value = date.join("-");
                            text.innerHTML = date.join("-");
                            current.xdp.date.setFullYear(Number(date[0]));
                            current.xdp.date.setMonth(Number(date[1]) - 1);
                            current.xdp.date.setDate(Number(date[2]));
                            if (current.hasAttribute(x.DatePicker.options.Attributes.DisabledDates))
                                current.xdp.disabledDates = getArray(current.getAttribute(x.DatePicker.options.Attributes.DisabledDates));
                            if (current.hasAttribute(x.DatePicker.options.Attributes.DisabledDays))
                                current.xdp.disabledDays = getArray(current.getAttribute(x.DatePicker.options.Attributes.DisabledDays));
                        }
                    }

                    // init the calendar
                    x.DatePicker._init(current, text, modal, display, dates);
                });
                observer.observe(current, {
                    attributes: true,
                    attributeFilter: attributes
                });
            }
            Observer("value", x.DatePicker.options.Attributes.DisabledDates, x.DatePicker.options.Attributes.DisabledDays);

            // check the direction of the document
            const documentObserver = new MutationObserver(mutationsList => {
                for (let mutation of mutationsList) {
                    if (mutation.type === "attributes" && mutation.attributeName === "dir") {
                        if (document.documentElement.getAttribute("dir") === "rtl") {
                            prev.classList.add("-rotate-180");
                            next.classList.add("rotate-180");
                        } else {
                            prev.classList.remove("-rotate-180");
                            next.classList.remove("rotate-180");
                        }
                    }
                }
            });
            documentObserver.observe(document.documentElement, {
                attributes: true,
                attributeFilter: ["dir"]
            });

            // add style if disabled
            const fn = (function fn() {
                if (current.hasAttribute(x.DatePicker.options.Attributes.Disabled)) {
                    wrapper.classList.add("opacity-80", "xdp-disabled");
                } else {
                    wrapper.classList.remove("opacity-80", "xdp-disabled");
                }
                return fn;
            })()

            // check the disabled of the datepicker
            const disabledObserver = new MutationObserver(mutationsList => {
                for (let mutation of mutationsList) {
                    if (mutation.type === "attributes" && mutation.attributeName === x.DatePicker.options.Attributes.Disabled) {
                        fn();
                    }
                }
            });
            disabledObserver.observe(current, {
                attributes: true,
                attributeFilter: [x.DatePicker.options.Attributes.Disabled]
            });

            // set the value if exists
            if (current.hasAttribute("value")) {
                const value = current.getAttribute("value");
                const now = new Date();
                const data = {
                    "#now": now.getTime(),
                    "#after": (new Date(now)).setDate(now.getDate() + 1),
                    "#before": (new Date(now)).setDate(now.getDate() - 1),
                }
                const date = new Date(data[value] || value);
                current.setAttribute("value", x.DatePicker._format(date));
            }

            // init the calendar
            x.DatePicker._init(current, text, modal, display, dates);

            // add resize to remove scroll from body on mobile and add it on pc
            window.addEventListener("resize", () => {
                if (current.xdp.status === "open") {
                    if (!matchMedia("(min-width: 1024px)").matches) document.body.classList.add("!overflow-hidden", "!h-screen");
                    else document.body.classList.remove("!overflow-hidden", "!h-screen");
                }
            });

            // append the template after the select
            current.insertAdjacentElement("afterend", wrapper);

            // remove all the attributes
            current.removeAttribute(x.DatePicker.options.Attributes.Selector);
        }

        // return self after end
        return this;
    },
    TimePicker() {
        // select all the elements with the selector
        var targets = document.querySelectorAll(`[${x.TimePicker.options.Attributes.Selector}]`);

        // add join elements arrays if exist
        if (x.TimePicker.options.Elements.length) targets = [...targets, ...x.TimePicker.options.Elements];

        // return if no targets exist
        if (!targets.length) return this;

        const template = `<div class="xtp-content-container flex w-full h-full items-center p-2 pe-10 border border-gray-200 bg-[#fcfcfc] rounded-md text-base text-gray-950 cursor-pointer"><div class="xtp-content-scroller w-full overflow-auto no-scrollbar"><div class="xtp-text w-max flex gap-1 items-center"></div></div></div><div class="xtp-open-container pointer-events-none w-full absolute top-0 left-0 bottom-0 right-0 p-2 flex items-center"><button type="button" aria-label="open-button" class="xtp-open flex items-center justify-center w-6 h-6 hover:bg-gray-300 focus:bg-gray-300 hover:bg-opacity-50 focus:bg-opacity-50 outline-none cursor-pointer rounded-md pointer-events-auto ms-auto"><svg class="xtp-open-icon block pointer-events-none text-gray-950 w-4 h-4" fill="currentColor" viewBox="0 -960 960 960"><path d="M326-150h308v-116.452Q634-334 589.931-382q-44.07-48-109.763-48-65.693 0-109.931 48.007Q326-333.986 326-266.442V-150Zm450 91H185q-19.35 0-32.675-12.86Q139-84.72 139-104.36T152.325-137Q165.65-150 185-150h50v-116.652Q235-336 268-393.5t93-86.5q-60-31-93-88t-33-126.348V-810h-50q-19.35 0-32.675-13.56Q139-837.119 139-855.772q0-20.053 13.325-33.14Q165.65-902 185-902h591q18.25 0 32.125 13.263T822-855.921q0 19.553-13.875 32.737Q794.25-810 776-810h-50v115.652Q726-625 692.5-568T600-480q59 29 92.5 86.637T726-267v117h50q18.25 0 32.125 13.375Q822-123.249 822-104.509q0 20.14-13.875 32.825Q794.25-59 776-59Z"/></svg></button></div><div class="xtp-modal backdrop-blur-sm fixed inset-0 bg-gray-950 bg-opacity-50 z-50 flex items-end justify-center lg:absolute lg:inset-auto lg:left-0 lg:right-0 lg:top-full lg:mt-1 lg:rounded-md lg:border lg:border-gray-200 lg:min-w-[18rem] lg:bg-transparent !hidden"><div class="xtp-time-container w-full bg-white grid grid-rows-1 grid-cols-2 rounded-t-md lg:rounded-md overflow-hidden max-h-custom lg:max-h-[300px] p-4 gap-4"><ul class="xtp-hours flex flex-col w-full flex-1 overflow-auto rounded-md border border-gray-200 bg-white"></ul><ul class="xtp-minutes flex flex-col w-full flex-1 overflow-auto rounded-md border border-gray-200 bg-white"></ul></div></div>`;

        x.TimePicker._label = document.createElement("span");
        x.TimePicker._item = document.createElement("li");
        x.TimePicker._label.className = x.TimePicker.options.ClassNames.Label;
        x.TimePicker._item.className = x.TimePicker.options.ClassNames.Item;
        x.TimePicker._label.innerHTML = x.TimePicker.options.Empty;

        // loop through all the targets
        for (let i = 0; i < targets.length; i++) {
            const current = targets[i];

            // add default object needed after
            current.xtp = {
                hours: x.TimePicker._format((new Date()).getHours()),
                minutes: x.TimePicker._format((new Date()).getMinutes()),
            }

            // hide the timepicker
            current.classList.add("hidden");

            // create a div wrapper and add the calsses and template
            const wrapper = document.createElement("div");
            wrapper.classList.add("xtp-container", "relative", "rounded-md", "focus-within:outline", "focus-within:outline-2", "focus-within:-outline-offset-2", "focus-within:outline-blue-400");
            wrapper.innerHTML = template;

            // select and creaate the nessary elements
            const content = wrapper.querySelector(".xtp-content-container");
            const text = wrapper.querySelector(".xtp-text");
            const modal = wrapper.querySelector(".xtp-modal");
            const open = wrapper.querySelector(".xtp-open");
            const wrap = wrapper.querySelector(".xtp-time-container");
            const hours = wrapper.querySelector(".xtp-hours");
            const minutes = wrapper.querySelector(".xtp-minutes");
            const label = x.TimePicker._label.cloneNode(true);
            text.append(label);

            // set the labal if the place holder exist
            if (current.attributes[x.TimePicker.options.Attributes.Placeholder] && current.attributes[x.TimePicker.options.Attributes.Placeholder].value.trim().length) {
                label.innerHTML = current.attributes[x.TimePicker.options.Attributes.Placeholder].value.trim();
            }

            // add the trigger events to elements
            [current, content].forEach(el => el.addEventListener("click", () => {
                open.click();
            }));

            // add the trigger events to elements
            open.addEventListener("click", (e) => {
                e.preventDefault();
                x.TimePicker._toggle(current, modal);
            });

            // Add a click event listener to the outer div
            modal.addEventListener('click', (e) => {
                // Check if the clicked element is the outer div itself
                if (e.target === modal && !modal.classList.contains("!hidden")) {
                    x.TimePicker._toggle(current, modal);
                }
            });

            // Add a click event listener to the inner div
            wrap.addEventListener('click', (e) => {
                // Prevent the click event from bubbling up to the outer div
                e.stopPropagation();
            });

            // hide the div when click outside
            window.addEventListener("click", function(e) {
                if (!wrapper.contains(e.target) && !modal.classList.contains("!hidden")) {
                    x.TimePicker._toggle(current, modal);
                }
            });

            // create observers to observe attributes changes
            function Observer(...attributes) {
                const observer = new MutationObserver(mutationsList => {
                    const time = new Date("2000-01-01 " + current.getAttribute("value"));
                    current.xtp.hours = x.TimePicker._format(time.getHours());
                    current.xtp.minutes = x.TimePicker._format(time.getMinutes());
                    x.TimePicker._choose(current, text, hours, minutes);
                });
                observer.observe(current, {
                    attributes: true,
                    attributeFilter: attributes
                });
            }
            Observer("value");

            // add style if disabled
            const fn = (function fn() {
                if (current.hasAttribute(x.TimePicker.options.Attributes.Disabled)) {
                    wrapper.classList.add("opacity-80", "xtp-disabled");
                } else {
                    wrapper.classList.remove("opacity-80", "xtp-disabled");
                }
                return fn;
            })();

            // check the disabled of the datepicker
            const disabledObserver = new MutationObserver(mutationsList => {
                for (let mutation of mutationsList) {
                    if (mutation.type === "attributes" && mutation.attributeName === x.TimePicker.options.Attributes.Disabled) {
                        fn();
                    }
                }
            });
            disabledObserver.observe(current, {
                attributes: true,
                attributeFilter: [x.TimePicker.options.Attributes.Disabled]
            });

            // set the value if exists
            if (current.hasAttribute("value")) {
                const time = new Date("2000-01-01 " + current.getAttribute("value"));
                const now = new Date();
                const after = new Date(now);
                const before = new Date(now);
                after.setHours(now.getHours() + 1);
                before.setHours(now.getHours() - 1);
                const data = {
                    "#now": `${x.TimePicker._format(now.getHours())}:${x.TimePicker._format(now.getMinutes())}`,
                    "#after": `${x.TimePicker._format(after.getHours())}:${x.TimePicker._format(after.getMinutes())}`,
                    "#before": `${x.TimePicker._format(before.getHours())}:${x.TimePicker._format(before.getMinutes())}`,
                }
                current.setAttribute("value", data[current.getAttribute("value")] || `${x.TimePicker._format(time.getHours())}:${x.TimePicker._format(time.getMinutes())}`);
            }

            // init the time
            x.TimePicker._init(current, text, hours, minutes);

            // add resize to remove scroll from body on mobile and add it on pc
            window.addEventListener("resize", () => {
                if (current.xtp.status === "open") {
                    if (!matchMedia("(min-width: 1024px)").matches) document.body.classList.add("!overflow-hidden", "!h-screen");
                    else document.body.classList.remove("!overflow-hidden", "!h-screen");
                }
            });

            // append the template after the select
            current.insertAdjacentElement("afterend", wrapper);

            // remove all the attributes
            current.removeAttribute(x.TimePicker.options.Attributes.Selector);
        }

        // return self after end
        return this;
    },
    DataTable() {
        // select all the elements with the selector
        var targets = document.querySelectorAll(`[${x.DataTable.options.Attributes.Selector}]`);

        // add join elements arrays if exist
        if (x.DataTable.options.Elements.length) targets = [...targets, ...x.DataTable.options.Elements];

        // return if no targets exist
        if (!targets.length) return this;

        const template = `<div class="xt-filter-container flex gap-2"><input type="search" placeholder="${x.DataTable.options.Data.Search}" class="xt-search flex-1 w-0 lg:max-w-xs appearance-none rounded-md px-3 py-2 border border-gray-200 bg-[#fcfcfc] text-base text-gray-950 focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-blue-400"
        /><div class="xt-filter-left w-max ms-auto flex flex-wrap gap-2 items-stretch"><div class="xt-select-container w-max relative rounded-md pointer-events-auto focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-blue-400"><div class="xt-select-text flex w-full h-full items-center p-2 pe-10 border border-gray-200 bg-[#fcfcfc] rounded-md text-base text-gray-950 cursor-pointer">10</div><div class="xt-select-open-container w-full absolute top-0 left-0 bottom-0 right-0 p-2 flex items-center pointer-events-none"><button type="button" aria-label="open-button" class="xt-select-open flex items-center justify-center w-6 h-6 hover:bg-gray-300 focus:bg-gray-300 hover:bg-opacity-50 focus:bg-opacity-50 outline-none cursor-pointer rounded-md pointer-events-auto ms-auto"><svg class="xt-select-open-icon block pointer-events-none text-gray-950 w-4 h-4" fill="currentColor" viewBox="0 0 26 15"><path d="M12.9943 14.85C12.698 14.85 12.409 14.7909 12.1273 14.6727C11.8457 14.5545 11.6198 14.3803 11.4498 14.15L1.49983 4.3C1.09983 3.85833 0.908161 3.32292 0.924828 2.69375C0.941495 2.06458 1.14983 1.525 1.54983 1.075C2.04983 0.591667 2.59983 0.375 3.19983 0.425C3.79983 0.475 4.31649 0.7 4.74983 1.1L12.9998 9.35L21.2998 1.1C21.7165 0.666667 22.2457 0.441667 22.8873 0.425C23.529 0.408333 24.0665 0.640484 24.4998 1.12145C24.9665 1.56905 25.1832 2.11072 25.1498 2.74645C25.1165 3.38215 24.8832 3.9 24.4498 4.3L14.5998 14.15C14.3943 14.3803 14.1494 14.5545 13.8651 14.6727C13.5809 14.7909 13.2906 14.85 12.9943 14.85Z"></path></svg></button></div><div class="xt-select-modal backdrop-blur-sm fixed inset-0 bg-gray-950 bg-opacity-50 z-50 flex items-end justify-center lg:absolute lg:inset-auto lg:left-0 lg:right-0 lg:rounded-md lg:top-full lg:mt-1 lg:bg-transparent !hidden"><ul class="xt-select-list bg-white flex flex-col w-full flex-1 border-gray-200 lg:border rounded-t-md lg:rounded-md py-6 lg:py-0"><li data-value="10" tabindex="0" class="xt-select-item border-t border-gray-200 lg:border-none w-full text-base py-2 px-3 lg:py-1 text-gray-950 hover:bg-gray-300 focus:bg-gray-300 hover:bg-opacity-50 focus:bg-opacity-50 outline-none cursor-pointer">10</li><li data-value="50" tabindex="0" class="xt-select-item w-full text-base py-2 px-3 lg:py-1 text-gray-950 hover:bg-gray-300 focus:bg-gray-300 hover:bg-opacity-50 focus:bg-opacity-50 outline-none cursor-pointer">50</li><li data-value="100" tabindex="0" class="xt-select-item border-b border-gray-200 lg:border-none w-full text-base py-2 px-3 lg:py-1 text-gray-950 hover:bg-gray-300 focus:bg-gray-300 hover:bg-opacity-50 focus:bg-opacity-50 outline-none cursor-pointer">100</li></ul></div></div><button class="xt-download w-[42px] aspect-square rounded-md flex items-center justify-center text-gray-50 bg-green-400 hover:bg-opacity-50 focus:bg-opacity-50 outline-none"><svg class="block w-6 h-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960"><path d="M479.256-353q-8.847 0-16.951-3.955Q454.2-360.909 448-367L288-526q-12-13-12-32.5t14-33q13-12.5 31.5-12.5t32.5 13l80 82v-311q0-20.075 13.56-33.537Q461.119-867 479.86-867q20.14 0 32.64 13.463Q525-840.075 525-820v311l82-82q13-13 32-13t32 13q13 13 13 32.5T671-526L512-367q-6.195 6-15.261 10-9.066 4-17.483 4ZM205-116q-35.775 0-63.388-27.034Q114-170.069 114-208.5V-350q0-18.8 13.56-32.4 13.559-13.6 32.3-13.6 20.14 0 32.64 13.6t12.5 32.297V-208h549v-142.103q0-18.697 12.86-32.297 12.859-13.6 32.5-13.6Q819-396 832-382.4t13 32.297V-208q0 38.225-28.138 65.112Q788.725-116 754-116H205Z"/></svg></button></div></div><div class="xt-overflow-hidden w-full overflow-hidden"><div class="xt-table-container overflow-auto"><table class="xt-table border-separate border-spacing-y-2 w-max min-w-full text-base"><thead class="xt-table-head uppercase text-sm text-gray-950 font-black"></thead><tbody class="xt-table-body"></tbody></table></div></div><div class="xt-pagination w-full flex justify-end flex-wrap lg:ms-auto -mt-1"></div>`;

        x.DataTable._Pagination = document.createElement("button");
        x.DataTable._Pagination.className = x.DataTable.options.ClassNames.Pagination;

        // loop through all the targets
        for (let i = 0; i < targets.length; i++) {
            const current = targets[i];

            current.classList.add("hidden");

            // add default object needed after
            current.xt = {
                remove: (current.getAttribute(x.DataTable.options.Attributes.Remove) || "").split(",").filter(e => e.trim().length).map(e => parseInt(e)),
                download: current.getAttribute(x.DataTable.options.Attributes.Download) || "",
                head: current.hasAttribute(x.DataTable.options.Attributes.Head),
                show: 10,
            }

            const wrapper = document.createElement("div");
            wrapper.classList.add("xt-container", "relative", "flex", "flex-col", "gap-2");
            wrapper.innerHTML = template;

            const pagination = wrapper.querySelector(".xt-pagination");
            //const container = wrapper.querySelector(".xt-table-container");
            const download = wrapper.querySelector(".xt-download");
            const table = wrapper.querySelector(".xt-table");
            const search = wrapper.querySelector(".xt-search");

            const content = wrapper.querySelector(".xt-select-container");
            const text = wrapper.querySelector(".xt-select-text");
            const open = wrapper.querySelector(".xt-select-open");
            const modal = wrapper.querySelector(".xt-select-modal");
            const list = wrapper.querySelector(".xt-select-list");

            // add the trigger events to elements
            for (let el of[open, text]) {
                el.addEventListener("click", (e) => {
                    e.preventDefault();
                    x.DataTable._toggle(current, modal, content)
                });
            }

            // Add a click event listener to the outer div
            modal.addEventListener('click', (e) => {
                // Check if the clicked element is the outer div itself
                if (e.target === modal && !modal.classList.contains("!hidden")) {
                    x.DataTable._toggle(current, modal, content)
                }
            });

            // Add a click event listener to the inner div
            list.addEventListener('click', (e) => {
                // Prevent the click event from bubbling up to the outer div
                e.stopPropagation();
            });

            // hide the div when click outside
            window.addEventListener("click", function(e) {
                if (!content.contains(e.target) && !modal.classList.contains("!hidden")) {
                    x.DataTable._toggle(current, modal, content)
                }
            });

            // add table head
            if (current.tHead) {
                const _ = document.createElement("tr");
                _.classList.add("xt-table-head-row");
                [...current.querySelectorAll("thead tr td")].forEach((td) => {
                    td.className = x.DataTable.options.ClassNames.Head;
                    _.appendChild(td);
                });
                table.tHead.appendChild(_);
            }

            // add table body
            [...current.querySelectorAll("tbody tr")].forEach((tr, i) => {
                const _ = document.createElement("tr");
                _.className = x.DataTable.options.ClassNames[i % 2 ? "RowEven" : "RowOdd"];
                [...tr.querySelectorAll("td")].forEach(td => {
                    td.className = x.DataTable.options.ClassNames[i % 2 ? 'Even' : 'Odd'];
                    _.appendChild(td);
                });
                table.tBodies[0].appendChild(_);
            });

            const length = table.tHead.querySelectorAll("td").length,
                body = table.tBodies[0],
                rows = [...body.children];
            let items = [...body.children],
                pages = x.DataTable._chunck(items);

            const tableClone = table.cloneNode(true);
            tableClone.tBodies[0].innerHTML = "";
            rows.forEach(r => tableClone.tBodies[0].appendChild(r.cloneNode(true)));

            // add download
            download.addEventListener("click", () => {
                if (current.hasAttribute(x.DataTable.options.Attributes.Download))
                    x.DataTable._download(tableClone, current.xt.download, current.xt.remove, current.xt.head);
            });

            // search function
            search.addEventListener("input", e => {
                const filter = (e.target.value.toUpperCase() || "").trim();
                if (filter === "") {
                    items = [...rows];
                } else {
                    items = rows.filter(item => {
                        const phrase = item.innerText.toUpperCase().trim();
                        return filter.split(" ").every(niddle => phrase.includes(niddle));
                    });
                }
                pages = x.DataTable._chunck(items, current.xt.show);
                x.DataTable._populate(body, pages, 0, length);
                x.DataTable._pagination(pagination, body, pages, length);
            });

            // select items fn
            const fn = (e) => {
                const val = parseInt(e.target.dataset.value);
                current.xt.show = val;
                text.innerHTML = val;
                x.DataTable._toggle(current, modal, content);
                pages = x.DataTable._chunck(items, val);
                x.DataTable._populate(body, pages, 0, length);
                x.DataTable._pagination(pagination, body, pages, length);
            }

            // add filter by number
            [...list.children].forEach(li => {
                li.addEventListener("click", fn);
                li.addEventListener("keydown", (e) => {
                    if (e.keyCode === 13) fn(e);
                });
            });

            // hide fields
            const _fn = (function _fn() {
                const _ = () => {
                    pages = x.DataTable._chunck(items, current.xt.show);
                    x.DataTable._populate(body, pages, 0, length);
                    x.DataTable._pagination(pagination, body, pages, length);
                }

                if (current.hasAttribute(x.DataTable.options.Attributes.Search)) search.classList.remove("hidden", "pointer-events-none");
                else search.classList.add("hidden", "pointer-events-none");

                if (current.hasAttribute(x.DataTable.options.Attributes.Download)) download.classList.remove("hidden", "pointer-events-none");
                else download.classList.add("hidden", "pointer-events-none");

                if (current.hasAttribute(x.DataTable.options.Attributes.Paginate)) {
                    content.classList.remove("hidden", "pointer-events-none");
                    pagination.classList.remove("hidden", "pointer-events-none");
                    current.xt.show = 10;
                    _();
                } else {
                    content.classList.add("hidden", "pointer-events-none");
                    pagination.classList.add("hidden", "pointer-events-none");
                    current.xt.show = rows.length;
                    _();
                }

                current.xt.remove = (current.getAttribute(x.DataTable.options.Attributes.Remove) || "").split(",").filter(e => e.trim().length).map(e => parseInt(e));
                current.xt.head = current.hasAttribute(x.DataTable.options.Attributes.Head);
                current.xt.download = current.getAttribute(x.DataTable.options.Attributes.Download) || "";

                return _fn;
            })();

            (new MutationObserver(() => {
                _fn();
            })).observe(current, {
                attributes: true,
                attributeFilter: [x.DataTable.options.Attributes.Search, x.DataTable.options.Attributes.Paginate, x.DataTable.options.Attributes.Download]
            });


            x.DataTable._populate(body, pages, 0, length);
            x.DataTable._pagination(pagination, body, pages, length);

            // append the template after the select
            current.insertAdjacentElement("afterend", wrapper);

            // remove all the attributes
            current.removeAttribute(x.DataTable.options.Attributes.Selector);
        }

        // return self after end
        return this;
    }
}

x.Capitalize.options = {
    Elements: [],
    Attributes: {
        Selector: "x-capitalize"
    },
}

x.Toggle.options = {
    Elements: [],
    Attributes: {
        Selector: "x-toggle",
        Targets: "x-targets",
        Properties: "x-properties"
    },
}

x.Icon.options = {
    Elements: [],
    Attributes: {
        Selector: "x-icon",
        Target: "x-target",
    },
}

x.Switch.options = {
    Elements: [],
    Attributes: {
        Selector: "x-switch",
        Label: "x-label",
    },
    ClassNames: {
        Input: "xs-input relative w-12 h-6 bg-[#fcfcfc] checked:bg-none checked:bg-blue-400 border border-gray-200 rounded-full cursor-pointer transition-colors ease-in-out duration-200 appearance-none focus-within:outline focus-within:outline-2 focus-within:outline-offset-px checked:focus-within:outline-gray-950 focus-within:outline-blue-400 before:content-[''] before:absolute before:top-1/2 before:-translate-y-1/2 rtl:before:left-auto rtl:before:-right-px before:-left-px before:block before:w-6 before:h-6 before:bg-gray-50 before:border before:border-gray-200 rtl:checked:before:-translate-x-full checked:before:translate-x-full before:rounded-full before:transform before:transition before:ease-in-out before:duration-200"
    }
}

x.Password.options = {
    Elements: [],
    Attributes: {
        Selector: "x-password"
    },
}

x.Select.options = {
    GroupSymbol: "&#10022;",
    Empty: "&nbsp;",
    Elements: [],
    Attributes: {
        Selector: "x-select",
        Multiple: "multiple",
        Disabled: "disabled",
        Placeholder: "placeholder",
        Max: "x-max"
    },
    ClassNames: {
        Selected: "xs-item-selected w-full truncate overflow-hidden text-base py-2 px-3 text-gray-50 bg-blue-400 !hover:bg-blue-950 !focus:bg-blue-950 hover:bg-opacity-70 focus:bg-opacity-70 outline-none cursor-pointer",
        Item: "xs-item w-full truncate overflow-hidden text-base py-2 px-3 text-gray-950 hover:bg-gray-300 focus:bg-gray-300 hover:bg-opacity-50 focus:bg-opacity-50 outline-none cursor-pointer",
        Disabled: "xs-item-disabled w-full truncate overflow-hidden text-base py-2 px-3 text-gray-950 bg-stone-500 bg-opacity-60 pointer-events-none",
        Chosen: "xs-chosen block w-max bg-blue-400 text-gray-50 text-xs p-1 rounded-sm",
        Group: "xs-group w-full truncate overflow-hidden text-base py-1 px-2 text-gray-950 font-black",
        Label: "xs-label text-gray-400",
    },
};

x.DatePicker.options = {
    Empty: "&nbsp;",
    Elements: [],
    Attributes: {
        Selector: "x-date",
        Disabled: "disabled",
        Placeholder: "placeholder",
        DisabledDates: "x-disabled-dates",
        DisabledDays: "x-disabled-days",
    },
    ClassNames: {
        Date: "xdp-date w-full flex px-2 py-1 lg:py-2 items-center justify-center text-gray-950 text-sm font-semibold hover:bg-gray-300 focus:bg-gray-300 hover:bg-opacity-50 focus:bg-opacity-50 outline-none cursor-pointer rounded-md",
        Current: "xdp-date-current w-full flex px-2 py-1 lg:py-2 items-center justify-center text-gray-950 bg-blue-400 bg-opacity-50 text-sm font-semibold cursor-pointer rounded-md",
        Selected: "xdp-date-selected w-full flex px-2 py-1 lg:py-2 items-center justify-center text-gray-50 bg-blue-400 text-sm font-semibold cursor-pointer rounded-md",
        Disabled: "xdp-date-disabled w-full flex px-2 py-1 lg:py-2 items-center justify-center bg-gray-950 opacity-10 rounded-md pointer-events-none",
        OffRange: "xdp-date-off-range w-full flex px-2 py-1 lg:py-2 items-center justify-center pointer-events-none",
        Label: "xs-label text-gray-400",
    },
    Data: {
        WeekDays: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        YearMonths: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        ShowFullWeekDay: 3,
        ShowFullYearMonth: true,
    }
};

x.TimePicker.options = {
    Empty: "&nbsp;",
    Elements: [],
    Attributes: {
        Selector: "x-time",
        Disabled: "disabled",
        Placeholder: "placeholder",
    },
    ClassNames: {
        Selected: "xtp-item-selected w-full text-base py-2 px-3 text-center text-gray-50 bg-blue-400 !hover:bg-blue-950 !focus:bg-blue-950 hover:bg-opacity-70 focus:bg-opacity-70 outline-none cursor-pointer",
        Item: "xtp-item w-full text-base py-2 px-3 text-center text-gray-950 hover:bg-gray-300 focus:bg-gray-300 hover:bg-opacity-50 focus:bg-opacity-50 outline-none cursor-pointer",
        Label: "xtp-label text-gray-400",
    },
};

x.DataTable.options = {
    Elements: [],
    Attributes: {
        Selector: "x-table",
        Search: "x-search",
        Paginate: "x-paginate",
        Download: "x-download",
        Remove: "x-remove",
        Head: "x-head",
    },
    ClassNames: {
        Pagination: "xt-pagination-button text-base w-8 font-semibold aspect-square rounded-md flex items-center justify-center text-gray-950 hover:bg-gray hover:bg-gray-300 focus:bg-gray-300 hover:bg-opacity-50 focus:bg-opacity-50 outline-none cursor-pointer",
        Selected: "xt-pagination-button xt-pagination-selected text-base w-8 font-semibold aspect-square rounded-md flex items-center justify-center text-gray-50 bg-blue-400 cursor-pointer",
        Odd: "py-2 px-3 max-w-sm lg:max-w-md first:rounded-s-md last:rounded-e-md lg:first:rounded-s-lg lg:last:rounded-e-lg bg-blue-400 bg-opacity-5",
        Even: "py-2 px-3 max-w-sm lg:max-w-md first:rounded-s-md last:rounded-e-md lg:first:rounded-s-lg lg:last:rounded-e-lg",
        RowEven: "xt-table-row xt-table-row-even text-gray-950 text-base",
        RowOdd: "xt-table-row xt-table-row-odd text-gray-950 text-base",
        Head: "px-3 pb-1",
    },
    Data: {
        Search: "Search...",
        Empty: "No data found",
    }
};

x.Select._toggle = function(select, modal, search, list) {
    // return if the field is disabled
    if (select.hasAttribute(x.Select.options.Attributes.Disabled)) return;

    // show all items if some are hidden after search
    for (let item of list.children) {
        item.classList.remove("hidden");
    }

    // clear search input field and scroll the top of the list
    search.value = "";
    list.scrollTop = 0;

    // remove position classes and show or hide the modal
    modal.classList.remove("lg:top-full", "lg:mt-1", "lg:bottom-full", "lg:mb-1");
    modal.classList.toggle("!hidden");

    // check the position
    const classes =
        window.innerHeight - modal.getBoundingClientRect().top < modal.clientHeight ? ["lg:bottom-full", "lg:mb-1"] : ["lg:top-full", "lg:mt-1"];

    // add the correct classes
    modal.classList.add(...classes);

    // trigger the correct event close or open and the event toggle
    if (modal.classList.contains("!hidden")) {
        select.nextElementSibling.classList.remove("xs-outlined", "outline", "outline-2", "outline-blue-400", "-outline-offset-2");

        // add scroll to body and update status
        document.body.classList.remove("!overflow-hidden", "!h-screen");
        select.xs.status = "closed";

        select.dispatchEvent(
            new CustomEvent("x-close", {
                bubbles: true,
            })
        );
    } else {
        select.nextElementSibling.classList.add("xs-outlined", "outline", "outline-2", "outline-blue-400", "-outline-offset-2");

        // remove scroll from body if mobile and update status
        if (!matchMedia("(min-width: 1024px)").matches) document.body.classList.add("!overflow-hidden", "!h-screen");
        select.xs.status = "open";

        select.dispatchEvent(
            new CustomEvent("x-open", {
                bubbles: true,
            })
        );
    }

    select.dispatchEvent(
        new CustomEvent("x-toggle", {
            bubbles: true,
        })
    );
};

x.Select._choose = function(select, container, text, chosen, list, option, index = 0) {
    // check if the select allow multiple chose or not
    if (select.xs.multiple) {
        // check if the target is already selected or not
        if (chosen.classList.contains("xs-item-selected")) {
            // get index of target option in the data array
            const idx = select.xs.data.indexOf(option);

            // remove the target option from the data array
            select.xs.data.splice(idx, 1)

            // add the item classes to the target
            chosen.className = x.Select.options.ClassNames.Item;
        } else {
            // check if reached the max
            if (select.xs.data.length >= select.xs.max) return

            // add the selected classes to the target
            chosen.className = x.Select.options.ClassNames.Selected;

            // check if the target option not in the data array the add it
            !select.xs.data.includes(option) && select.xs.data.push(option);
        }

        // clear and display the value to the text field
        text.innerHTML = "";
        select.xs.data.forEach(e => {
            const clone = x.Select._chosen.cloneNode(true);
            clone.innerHTML = e.innerText.trim();
            text.append(clone);
        });

        // remove all the  chosen values
        [...container.querySelectorAll("[xs-chose]")].forEach(e => e.remove());

        // add all the chosen values
        select.xs.data.forEach(e => {
            container.insertAdjacentHTML("beforeend", `<input xs-chose type="hidden" value="${e.value}" name="${select.xs.name}"/>`);
        });
    } else {
        // set the correct index value to the select
        select.selectedIndex = index;

        // display the value to the text field
        text.innerText = chosen.innerText.trim();

        // remove the selected classes from the old selected item
        for (let item of list.children) {
            if (item.classList.contains("xs-item-selected"))
                item.className = x.Select.options.ClassNames.Item;
        }

        // add the selected classes to the new selected item
        chosen.className = x.Select.options.ClassNames.Selected;
    }

    // add label if empty
    if (!text.innerHTML.trim().length) {
        const label = x.Select._label.cloneNode(true);
        text.append(label);
        if (select.attributes[x.Select.options.Attributes.Placeholder] && select.attributes[x.Select.options.Attributes.Placeholder].value.trim().length) {
            label.innerHTML = select.attributes[x.Select.options.Attributes.Placeholder].value.trim();
        }
    }
}

x.Select._get = function(el, array, order = 0) {
    [...el.children].forEach(e => {
        if (e.tagName === "OPTION") {
            array.push({
                isOpt: true,
                text: e.innerHTML,
                value: e.value,
                selected: e.selected || e.hasAttribute("selected"),
                disabled: e.disabled || e.hasAttribute("disabled"),
                order: order,
                target: e,
            });
        } else {
            array.push({
                isOpt: false,
                label: e.label,
                order: 1
            });
            x.Select._get(e, array, 1);
        }
    });
    return array;
}

x.Select._clear = function(select, container, text, list) {
    // remove all the  chosen values
    list.innerHTML = "";
    text.innerHTML = "";
    const label = x.Select._label.cloneNode(true);
    text.append(label);
    if (select.attributes[x.Select.options.Attributes.Placeholder] && select.attributes[x.Select.options.Attributes.Placeholder].value.trim().length) {
        label.innerHTML = select.attributes[x.Select.options.Attributes.Placeholder].value.trim();
    }
    [...container.querySelectorAll("[xs-chose]")].forEach(e => e.remove());

    select.selectedIndex = -1;
    select.xs.data = [];
}

x.Select._init = function(select, text, container, modal, items, search, list) {
    // clear the list
    x.Select._clear(select, container, text, list);

    // get all the options and group options
    const options = x.Select._get(select, []).sort((x, y) => x.order - y.order);
    // hide the search field if items less than 10
    if (options.filter(opt => opt.isOpt === true).length <= 10) {
        search.parentElement.classList.add("hidden", "pointer-events-none");
        items.classList.add("py-6", "lg:py-0");
        list.classList.add("border-t", "border-b", "border-gray-200", "lg:border-none");
    } else {
        search.parentElement.classList.remove("hidden", "pointer-events-none");
        items.classList.remove("py-6", "lg:py-0");
        list.classList.remove("border-t", "border-b", "border-gray-200", "lg:border-none");
    }

    // loop throu all the options
    for (let i = 0; i < options.length; i++) {
        const option = options[i];
        const index = [...select.options].indexOf(option.target);

        // check if is a group or option
        if (option.isOpt) {
            // remove if no value
            if (!option.value.trim().length) continue;

            // clone the list item and set text value and tabindex
            const clone = x.Select._item.cloneNode(true);
            clone.innerHTML = option.text.trim();
            clone.dataset.value = option.value.trim();
            clone.setAttribute("tabindex", 0);

            // check if is selected but not disabled
            if (option.selected && !option.disabled) {
                x.Select._choose(select, container, text, clone, list, option.target, index);
            }

            // if disabled add classes
            if (option.disabled) {
                clone.className = x.Select.options.ClassNames.Disabled;
                select.selectedIndex = index;
                clone.removeAttribute("tabindex");
            }
            const fn = () => {
                // chose the target item
                x.Select._choose(select, container, text, clone, list, option.target, index);

                // if no multiple hide the modal
                if (!select.xs.multiple) {
                    x.Select._toggle(select, modal, search, list);
                }

                // displatch event
                select.dispatchEvent(new CustomEvent("x-change", {
                    bubbles: true,
                    detail: {
                        target: clone,
                        index: index,
                    }
                }))
            }

            // add events
            clone.addEventListener("click", fn);
            clone.addEventListener("keydown", (e) => {
                if (e.keyCode === 13) fn();
            });

            // append to list
            list.append(clone);
        } else {
            // if no label set default
            if (!option.label.trim().length) option.label = "_";

            // clone group and set text 
            const clone = x.Select._group.cloneNode(true);
            clone.innerHTML += " " + option.label.trim();

            // append to list
            list.append(clone);
        }
    }
}

x.DatePicker._string = function(string, opts) {
    if (opts === true) return string;
    return string.slice(0, opts);
}

x.DatePicker._format = function(date) {
    var year = date.getFullYear();
    var month = ("0" + (date.getMonth() + 1)).slice(-2);
    var day = ("0" + date.getDate()).slice(-2);
    return year + "-" + month + "-" + day;
}

x.DatePicker._toggle = function(date, modal) {
    // return if the field is disabled
    if (date.hasAttribute(x.DatePicker.options.Attributes.Disabled)) return;

    // remove position classes and show or hide the modal
    modal.classList.remove("lg:top-full", "lg:mt-1", "lg:bottom-full", "lg:mb-1");
    modal.classList.toggle("!hidden");

    // check the position
    const classes =
        window.innerHeight - modal.getBoundingClientRect().top < modal.clientHeight ? ["lg:bottom-full", "lg:mb-1"] : ["lg:top-full", "lg:mt-1"];

    // add the correct classes
    modal.classList.add(...classes);

    // trigger the correct event close or open and the event toggle
    if (modal.classList.contains("!hidden")) {
        date.nextElementSibling.classList.remove("xdp-outlined", "outline", "outline-2", "outline-blue-400", "-outline-offset-2");

        // add scroll to body and update status
        document.body.classList.remove("!overflow-hidden", "!h-screen");
        date.xdp.status = "closed";

        date.dispatchEvent(
            new CustomEvent("x-close", {
                bubbles: true,
            })
        );
    } else {
        date.nextElementSibling.classList.add("xdp-outlined", "outline", "outline-2", "outline-blue-400", "-outline-offset-2");

        // remove scroll from body if mobile and update status
        if (!matchMedia("(min-width: 1024px)").matches) document.body.classList.add("!overflow-hidden", "!h-screen");
        date.xdp.status = "open";

        date.dispatchEvent(
            new CustomEvent("x-open", {
                bubbles: true,
            })
        );
    }

    date.dispatchEvent(
        new CustomEvent("x-toggle", {
            bubbles: true,
        })
    );
};

x.DatePicker._choose = function(dates, date) {
    [...dates.querySelectorAll(".xdp-date-selected")].forEach(d => {
        d.className = x.DatePicker.options.ClassNames.Date;
    });
    date.className = x.DatePicker.options.ClassNames.Selected;
}

x.DatePicker._init = function(picker, text, modal, display, dates) {
    // clear the old dates
    dates.innerHTML = "";

    // create the date from given one
    const newdate = new Date(picker.xdp.date);
    newdate.setDate(1);

    // get indexes
    var lastDayIndex = new Date(newdate.getFullYear(), newdate.getMonth() + 1, 0).getDate();
    var lastDaysIndex = new Date(newdate.getFullYear(), newdate.getMonth() + 1, 0).getDay();
    var nextDaysIndex = 7 - lastDaysIndex - 1;
    var firstDayIndex = newdate.getDay();

    // show the current date in the display
    display.innerHTML = x.DatePicker._string(x.DatePicker.options.Data.YearMonths[newdate.getMonth()], x.DatePicker.options.Data.ShowFullYearMonth) + " " + newdate.getFullYear();

    // add the first OffRange dates of the month
    for (var i = firstDayIndex; i > 0; i--) {
        const clone = x.DatePicker._date.cloneNode(true);
        clone.className = x.DatePicker.options.ClassNames.OffRange;
        dates.append(clone);
    }

    // add the current dates of the month
    for (var i = 1; i <= lastDayIndex; i++) {
        const clone = x.DatePicker._date.cloneNode(true);
        const curdate = new Date(picker.xdp.date);
        clone.innerHTML = i < 10 ? "0" + i : i;
        curdate.setDate(i);
        clone.dataset.date = x.DatePicker._format(curdate);

        if (picker.xdp.disabledDates.includes(clone.dataset.date) || picker.xdp.disabledDays.includes(String(curdate.getDay() + 1))) {
            clone.className = x.DatePicker.options.ClassNames.Disabled;
            if (picker.xdp.disabledDates.includes(clone.dataset.date)) clone.classList.add("xdp-date-disabled-date");
            if (picker.xdp.disabledDays.includes(String(curdate.getDay() + 1))) clone.classList.add("xdp-date-disabled-day");
        } else {
            const testDate = new Date();
            if (i === testDate.getDate() && picker.xdp.date.getMonth() === testDate.getMonth() && picker.xdp.date.getFullYear() === testDate.getFullYear()) clone.className = x.DatePicker.options.ClassNames.Current;
            if (picker.value === clone.dataset.date) clone.className = x.DatePicker.options.ClassNames.Selected;
            clone.setAttribute("tabindex", 0);

            const fn = (e) => {
                const date = e.target.dataset.date.split("-");

                // display and set value
                text.innerHTML = date.join("-");
                picker.value = date.join("-");

                // set the new date to xdp
                picker.xdp.date.setFullYear(Number(date[0]));
                picker.xdp.date.setMonth(Number(date[1]) - 1);
                picker.xdp.date.setDate(Number(date[2]));

                // displatch event
                picker.dispatchEvent(new CustomEvent("x-change", {
                    bubbles: true,
                    detail: {
                        item: clone,
                        date: date.join("-"),
                    }
                }));

                x.DatePicker._toggle(picker, modal);
                x.DatePicker._choose(dates, clone);
            }

            // add events
            clone.addEventListener("click", fn);
            clone.addEventListener("keydown", (e) => {
                if (e.keyCode === 13) fn(e);
            });
        }

        // append clone
        dates.append(clone);
    }

    // dad the last OffRange days of the moth
    for (var i = 1; i <= nextDaysIndex; i++) {
        const clone = x.DatePicker._date.cloneNode(true);
        clone.className = x.DatePicker.options.ClassNames.OffRange;
        dates.append(clone);
    }
}

x.TimePicker._toggle = function(time, modal) {
    // return if the field is disabled
    if (time.hasAttribute(x.TimePicker.options.Attributes.Disabled)) return;

    // scroll top top
    [...modal.querySelectorAll("ul")].forEach(e => e.scrollTop = 0);

    // remove position classes and show or hide the modal
    modal.classList.remove("lg:top-full", "lg:mt-1", "lg:bottom-full", "lg:mb-1");
    modal.classList.toggle("!hidden");

    // check the position
    const classes =
        window.innerHeight - modal.getBoundingClientRect().top < modal.clientHeight ? ["lg:bottom-full", "lg:mb-1"] : ["lg:top-full", "lg:mt-1"];

    // add the correct classes
    modal.classList.add(...classes);

    // trigger the correct event close or open and the event toggle
    if (modal.classList.contains("!hidden")) {
        time.nextElementSibling.classList.remove("xtp-outlined", "outline", "outline-2", "outline-blue-400", "-outline-offset-2");

        // add scroll to body and update status
        document.body.classList.remove("!overflow-hidden", "!h-screen");
        time.xtp.status = "closed";

        time.dispatchEvent(
            new CustomEvent("x-close", {
                bubbles: true,
            })
        );
    } else {
        time.nextElementSibling.classList.add("xtp-outlined", "outline", "outline-2", "outline-blue-400", "-outline-offset-2");

        // remove scroll from body if mobile and update status
        if (!matchMedia("(min-width: 1024px)").matches) document.body.classList.add("!overflow-hidden", "!h-screen");
        time.xtp.status = "open";

        time.dispatchEvent(
            new CustomEvent("x-open", {
                bubbles: true,
            })
        );
    }

    time.dispatchEvent(
        new CustomEvent("x-toggle", {
            bubbles: true,
        })
    );
};

x.TimePicker._format = function(time) {
    time = parseInt(time);
    return time < 10 ? `0${time}` : String(time);
}

x.TimePicker._choose = function(time, text, hours, minutes) {
    // display the value
    text.innerHTML = `${time.xtp.hours}:${time.xtp.minutes}`;
    time.value = `${time.xtp.hours}:${time.xtp.minutes}`;

    // remove the selected classes from the old selected item
    for (let item of hours.children) {
        if (item.classList.contains("xtp-item-selected"))
            item.className = x.TimePicker.options.ClassNames.Item;
    }
    const hour = hours.querySelector(`[data-value="${time.xtp.hours}"]`);
    hour && (hour.className = x.TimePicker.options.ClassNames.Selected);

    // remove the selected classes from the old selected item
    for (let item of minutes.children) {
        if (item.classList.contains("xtp-item-selected"))
            item.className = x.TimePicker.options.ClassNames.Item;
    }
    const minute = minutes.querySelector(`[data-value="${time.xtp.minutes}"]`);
    minute && (minute.className = x.TimePicker.options.ClassNames.Selected);
}

x.TimePicker._init = function(time, text, hours, minutes) {
    hours.innerHTML = "";
    for (let i = 0; i < 24; i++) {
        const clone = x.TimePicker._item.cloneNode(true);
        clone.setAttribute("tabindex", 0);
        clone.dataset.value = x.TimePicker._format(i);
        clone.innerHTML = x.TimePicker._format(i);
        if (time.xtp.hours === clone.dataset.value) clone.className = x.TimePicker.options.ClassNames.Selected;
        const fn = () => {
            // chose the target item
            time.xtp.hours = clone.dataset.value;
            x.TimePicker._choose(time, text, hours, minutes);
            time.setAttribute("value", `${time.xtp.hours}:${time.xtp.minutes}`);

            // displatch event
            time.dispatchEvent(new CustomEvent("x-change", {
                bubbles: true,
                detail: {
                    target: clone,
                    type: "hour"
                }
            }))
        }

        // add events
        clone.addEventListener("click", fn);
        clone.addEventListener("keydown", (e) => {
            if (e.keyCode === 13) fn();
        });

        // append to hours
        hours.append(clone);
    }

    minutes.innerHTML = "";
    for (let i = 0; i < 60; i++) {
        const clone = x.TimePicker._item.cloneNode(true);
        clone.setAttribute("tabindex", 0);
        clone.dataset.value = x.TimePicker._format(i);
        clone.innerHTML = x.TimePicker._format(i);
        if (time.xtp.minutes === clone.dataset.value) clone.className = x.TimePicker.options.ClassNames.Selected;
        const fn = () => {
            // chose the target item
            time.xtp.minutes = clone.dataset.value;
            x.TimePicker._choose(time, text, hours, minutes);
            time.setAttribute("value", `${time.xtp.hours}:${time.xtp.minutes}`);

            // displatch event
            time.dispatchEvent(new CustomEvent("x-change", {
                bubbles: true,
                detail: {
                    target: clone,
                    type: "minute"
                }
            }))
        }

        // add events
        clone.addEventListener("click", fn);
        clone.addEventListener("keydown", (e) => {
            if (e.keyCode === 13) fn();
        });

        // append to minutes
        minutes.append(clone);
    }
}

x.DataTable._Csv = class {
    constructor(table, opts) {
        this.table = table;
        this._head = opts.head || true;
        this._remove = opts.remove || [];
        this.rows = Array.from(this.table.getElementsByTagName("tr"));
        if (!this._head) {
            this.rows = this.rows.filter(row => row.parentElement.tagName !== "THEAD");
        }
        for (const index of this._remove) {
            this.rows.forEach(row => row.deleteCell(index));
        }
    }

    static parse(cell) {
        let parsedValue = cell.textContent.trim().replace(/\s{2,}/g, " ");
        parsedValue = parsedValue.replace(/"/g, `""`);
        if (/[",\n]/.test(parsedValue)) {
            parsedValue = `"${parsedValue}"`;
        }
        return parsedValue;
    }

    convert() {
        const lines = [];
        for (const row of this.rows) {
            const values = [];
            for (const cell of row.cells) {
                values.push(x.DataTable._Csv.parse(cell));
            }
            lines.push(values.join(","));
        }
        return lines.join("\n");
    }
}

x.DataTable._toggle = function(table, modal, content) {
    modal.classList.toggle("!hidden");

    // trigger the correct event close or open and the event toggle
    if (modal.classList.contains("!hidden")) {
        content.classList.remove("xt-select-outlined", "outline", "outline-2", "outline-blue-400", "-outline-offset-2");

        // add scroll to body and update status
        document.body.classList.remove("!overflow-hidden", "!h-screen");
        table.xt.status = "closed";
    } else {
        content.classList.add("xt-select-outlined", "outline", "outline-2", "outline-blue-400", "-outline-offset-2");

        // remove scroll from body if mobile and update status
        if (!matchMedia("(min-width: 1024px)").matches) document.body.classList.add("!overflow-hidden", "!h-screen");
        table.xt.status = "open";
    }
};

x.DataTable._chunck = function(items, nbr = 10) {
    return items.reduce((resultArray, item, index) => {
        const chunkIndex = Math.floor(index / nbr);
        if (!resultArray[chunkIndex]) {
            resultArray[chunkIndex] = [];
        }
        resultArray[chunkIndex].push(item);
        return resultArray;
    }, []);
}

x.DataTable._populate = function(body, pages, index, length) {
    body.innerHTML = "";
    if (pages.length === 0)
        body.innerHTML = "<tr><td class='xt-table-row xt-table-empty py-4 text-center uppercase first:rounded-s-md last:rounded-e-md lg:first:rounded-s-lg lg:last:rounded-e-lg bg-gray-50' colspan='" + length + "'>" + x.DataTable.options.Data.Empty + "</td></tr>";
    else
        pages[index].forEach((row, i) => {
            if (i % 2) {
                row.className = x.DataTable.options.ClassNames.RowEven;
                [...row.querySelectorAll("td")].forEach(td => {
                    td.className = x.DataTable.options.ClassNames.Even;
                });
            } else {
                row.className = x.DataTable.options.ClassNames.RowOdd;
                [...row.querySelectorAll("td")].forEach(td => {
                    td.className = x.DataTable.options.ClassNames.Odd;
                });
            }
            body.append(row);
        });
}

x.DataTable._pagination = function(pagination, body, pages, length) {
    pagination.innerHTML = "";
    if (pages.length <= 1) return;
    pages.forEach((_, i) => {
        const clone = x.DataTable._Pagination.cloneNode(true);
        clone.className = x.DataTable.options.ClassNames.Pagination;
        clone.innerHTML = String(i + 1);
        if (i === 0) {
            x.DataTable._choose(pagination, clone);
        }
        pagination.append(clone);
        clone.addEventListener("click", e => {
            const index = [...pagination.children].indexOf(clone);
            x.DataTable._choose(pagination, clone);
            x.DataTable._populate(body, pages, index, length);
        });
    });
}

x.DataTable._choose = function(pagination, target) {
    for (let item of pagination.children) {
        if (item.classList.contains("xt-pagination-selected"))
            item.className = x.DataTable.options.ClassNames.Pagination;
    }
    target.className = x.DataTable.options.ClassNames.Selected;
}

x.DataTable._download = function(table, download, remove, head) {
    const opts = {
        head: head,
        remove: remove
    };
    const exporter = new x.DataTable._Csv(table, opts);
    const csvOutput = exporter.convert();
    const csvBlob = new Blob([csvOutput], {
        type: "text/csv"
    });
    const blobUrl = URL.createObjectURL(csvBlob);
    const anchorElement = document.createElement("a");
    anchorElement.href = blobUrl;
    anchorElement.download = download;
    anchorElement.click();
    anchorElement.remove();
    setTimeout(() => {
        URL.revokeObjectURL(blobUrl);
    }, 500);
}

x.fns.Validate = function(selector, {
    rules = {},
    errors = {},
    success = {},
    onSuccess = () => {},
    onFailure = () => {},
}) {
    const form = document.querySelector(selector);
    let isValid = true;
    for (const field in rules) {
        if (rules.hasOwnProperty(field)) {
            const _input = form.querySelector(`[name="${field}"]`);
            const _rules = typeof rules[field] === "string" ? rules[field].split("|") : rules[field];
            const _value = _input.value.trim();
            let isSuccess = true;
            _rules.forEach((rule) => {
                const ruleParts = rule.split(":");
                const ruleName = ruleParts[0];
                const ruleValue = ruleParts[1];
                const config = {
                    error: errors[field] && errors[field].replace(/\{\{\s*name\s*\}\}/g, x.fns.Validate._decamelize(field)),
                    default: x.fns.Validate.errors[ruleName].replace(/\{\{\s*other\s*\}\}/g, ruleValue).replace(/\{\{\s*name\s*\}\}/g, x.fns.Validate._decamelize(field))
                }
                switch (ruleName) {
                    case "required":
                        if (!x.fns.Validate.is.Required(_input, _value)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "email":
                        if (!x.fns.Validate.is.Email(_value)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "numeric":
                        if (!x.fns.Validate.is.Numeric(_value)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "integer":
                        if (!x.fns.Validate.is.Integer(_value)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "float":
                        if (!x.fns.Validate.is.Float(_value)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "alpha":
                        if (!x.fns.Validate.is.Alpha(_value)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "date":
                        if (!x.fns.Validate.is.Date(_value)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "url":
                        if (!x.fns.Validate.is.URL(_value)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "phone":
                        if (!x.fns.Validate.is.Phone(_value)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "zipcode":
                        if (!x.fns.Validate.is.ZipCode(_value)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "regex":
                        if (!x.fns.Validate.is.Regex(_value, ruleValue)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "strong":
                        if (!x.fns.Validate.is.Strong(_value, ruleValue)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "length":
                        if (!x.fns.Validate.is.Length(_value, ruleValue)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "min":
                        if (!x.fns.Validate.is.Min(_value, ruleValue)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "max":
                        if (!x.fns.Validate.is.Max(_value, ruleValue)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "size":
                        if (!x.fns.Validate.is.Size(_input, ruleValue)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                    case "type":
                        if (!x.fns.Validate.is.Type(_input, ruleValue)) {
                            isSuccess = false;
                            isValid = false;
                        }
                        break;
                }
                if (!isSuccess) onFailure({
                    form: form,
                    field: _input,
                    name: field,
                    message: config.error || config.default
                });
            });

            if (isSuccess) {
                const message = success[field] && success[field].replace(/\{\{\s*name\s*\}\}/g, x.fns.Validate._decamelize(field));
                onSuccess({
                    form: form,
                    field: _input,
                    name: field,
                    message: message
                });
            }
        }
    }
    return isValid;
}

x.fns.Validate._decamelize = function(str) {
    return str
        .replace(/([a-z])([A-Z])/g, '$1 $2')
        .replace(/_/g, ' ')
        .replace(/-/g, ' ')
        .toLowerCase();
}

x.fns.Validate.errors = {
    required: "The {{name}} field is required",
    email: "The {{name}} field must be a valid email address",
    numeric: "The {{name}} field must be a numeric value",
    integer: "The {{name}} field must be an integer",
    float: "The {{name}} field must be a floating-point number",
    alpha: "The {{name}} field must contain only alphabetic characters",
    date: "The {{name}} field must be a valid date in the format yyyy-mm-dd",
    url: "The {{name}} field must be a valid URL",
    phone: "The {{name}} field must be a valid phone number",
    zipcode: "The {{name}} field must be a valid zipcode",
    strong: "The {{name}} field must have a {{other}} characters",
    length: "The {{name}} field must have a length between {{other}}",
    min: "The {{name}} field must be greater than or equal to {{other}}",
    max: "The {{name}} field must be less than or equal to {{other}}",
    regex: "The {{name}} field format is invalid",
    size: "The {{name}} field size must be {{other}}",
    type: "The {{name}} field must be of type {{other}}",
};

x.fns.Validate.is = {
    Required(input, value) {
        if (["checkbox", "radio"].includes(input.type)) {
            const checkboxes = document.querySelectorAll(`[name="${input.name}"]`);
            return Array.from(checkboxes).some(checkbox => checkbox.checked);
        }
        return value.trim() !== "";
    },
    Email(value) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(value);
    },
    Numeric(value) {
        return !isNaN(value);
    },
    Integer(value) {
        return Number.isInteger(Number(value));
    },
    Float(value) {
        return !isNaN(parseFloat(value));
    },
    Alpha(value) {
        const alphaRegex = /^[A-Za-z]+$/;
        return alphaRegex.test(value);
    },
    Date(value) {
        const dateRegex = /^\d{4}-\d{2}-\d{2}$/;
        return dateRegex.test(value);
    },
    URL(value) {
        const urlRegex = /^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i;
        return urlRegex.test(value);
    },
    Phone(value) {
        const phoneNumberRegex = /^(?:\+*([0-9]{3}|0))(?:[ \-]?[0-9]){9}$/;
        return phoneNumberRegex.test(value);
    },
    Length(value, size) {
        const sizeParts = size.split(",").map(e => e.trim()).filter(e => e.length);
        const minLength = sizeParts[0] ? parseInt(sizeParts[0]) : null;
        const maxLength = sizeParts[1] ? parseInt(sizeParts[1]) : null;
        if (minLength !== null && value.length < minLength) {
            return false;
        }
        if (maxLength !== null && value.length > maxLength) {
            return false;
        }
        return true;
    },
    Strong(value, rules) {
        const rulesParts = rules.split(",").map(e => e.trim()).filter(e => e.length);
        let isValid = true;
        rulesParts.forEach((rule) => {
            rule = rule.trim();
            if (rule === "uppercase" && !/[A-Z]/.test(value)) {
                isValid = false;
            }
            if (rule === "lowercase" && !/[a-z]/.test(value)) {
                isValid = false;
            }
            if (rule === "numeric" && !/\d/.test(value)) {
                isValid = false;
            }
            if (rule === "special" && !/[!@#$%^&*]/.test(value)) {
                isValid = false;
            }
        });
        return isValid;
    },
    Min(value, size) {
        return parseFloat(value) >= parseFloat(size);
    },
    Max(value, size) {
        return parseFloat(value) <= parseFloat(size);
    },
    Regex(value, regex) {
        const customRegex = new RegExp(regex);
        return customRegex.test(value);
    },
    ZipCode(value) {
        const postalCodeRegex = /^\d{5}$/;
        return postalCodeRegex.test(value);
    },
    Size(input, size) {
        const maxSize = parseInt(size);
        return input.files[0].size <= maxSize;
    },
    Type(input, allowedTypes) {
        const fileTypes = input.accept.split(",").map(e => e.trim()).filter(e => e.length);
        return fileTypes.some((type) => allowedTypes.includes(type));
    },
};

x.fns.PieChart = function(selector, {
    data,
    donut,
    stroke = 50
}) {
    var canvas = document.querySelector(selector);
    var ctx = canvas.getContext("2d");
    var centerX = canvas.width / 2;
    var centerY = canvas.height / 2;
    var total = 0;

    // Calculate the total value
    for (var i = 0; i < data.length; i++) {
        total += data[i].value;
    }

    // Set up the starting angle at the top center
    var startAngle = -Math.PI / 2;

    // Draw the slices
    for (var i = 0; i < data.length; i++) {
        var sliceAngle = (2 * Math.PI * data[i].value) / total;

        ctx.beginPath();
        ctx.moveTo(centerX, centerY);
        ctx.arc(centerX, centerY, centerY, startAngle, startAngle + sliceAngle);

        if (donut) {
            // Draw the inner circle to create a donut chart
            var innerRadius = centerY * ((100 - stroke) / 100);
            ctx.arc(centerX, centerY, innerRadius, startAngle + sliceAngle, startAngle, true);
        }

        ctx.closePath();
        ctx.fillStyle = data[i].color;
        ctx.fill();

        startAngle += sliceAngle;
    }
}

x.fns.getCssVars = function(varName) {
    return getComputedStyle(document.documentElement).getPropertyValue(varName);
}