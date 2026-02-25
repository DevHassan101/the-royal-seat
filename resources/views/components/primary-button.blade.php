<button
    {{ $attributes->merge([
        'type' => 'submit',
        'class' => 'inline-flex items-center justify-center w-full text-sm font-bold tracking-wide transition-all duration-200 focus:outline-none disabled:opacity-60 disabled:cursor-not-allowed'
    ]) }}
    style="
        background: linear-gradient(135deg, #c9982b, #a67d23);
        color: #0f1117;
        padding: 0.82rem 1.5rem;
        border: none;
        box-shadow: 0 4px 20px rgba(201,152,43,0.38);
        cursor: pointer;
        font-family: inherit;
        letter-spacing: 0.04em;
        border-radius: 10px ;
        font-weight: 500;
        color: white;
    "
    onmouseover="this.style.background='linear-gradient(135deg,#dba830,#c9982b)'; this.style.boxShadow='0 6px 28px rgba(201,152,43,0.52)'; this.style.transform='translateY(-1px)';"
    onmouseout="this.style.background='linear-gradient(135deg,#c9982b,#a67d23)'; this.style.boxShadow='0 4px 20px rgba(201,152,43,0.38)'; this.style.transform='translateY(0)';"
    onmousedown="this.style.transform='translateY(0)';"
>
    {{ $slot }}
</button>