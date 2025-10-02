<template>
    <div class="row search-box bg-white shadow  p-3 d-flex  align-items-center" style="border-radius: 20px;">
        <div class="col-md-4  text-start" style="border-right: 1px solid #DED1BA;">
            <label class="form-label fw-bold text-dark mb-0">Concern / Practice</label>
            <input type="text" class="form-control border-0 shadow-none" placeholder='Try "Anxiety" or "Naturopathy"' />
        </div>

        <div class=" col-md-4 text-start" style="border-right: 1px solid #DED1BA;">
            <label class="form-label fw-bold text-dark mb-0 text-start">Locations</label>
            <div class="d-flex gap-2">
                <input type="text" class="form-control border-0 shadow-none" placeholder="Anywhere" />
                <button class="btn btn-outline-dark rounded-pill btn-sm"
                    style="font-size: 10px;width: 320px;background-color: #5B4C3A;color:white;">My Current
                    Location
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15 8H13.4445M13.4445 8C13.4445 9.44408 12.8712 10.8286 11.8501 11.8498C10.829 12.8709 9.44408 13.4445 8 13.4445M13.4445 8C13.4445 6.55592 12.8712 5.17063 11.8501 4.14951C10.829 3.12839 9.44408 2.55547 8 2.55547M8 1V2.55547M8 2.55547C6.55602 2.55547 5.17119 3.12835 4.15014 4.1494C3.12909 5.17045 2.55547 6.55528 2.55547 7.99926C2.55547 9.44324 3.12909 10.8281 4.15014 11.8491C5.17119 12.8702 6.55602 13.4445 8 13.4445M1 8H2.55547M8 15V13.4445"
                            stroke="#FBF9F7" stroke-width="1.10526" stroke-miterlimit="10" stroke-linecap="round" />
                        <path
                            d="M7.99986 11.1111C8.82494 11.1111 9.61622 10.7833 10.1996 10.1999C10.7831 9.61646 11.1108 8.82518 11.1108 8.00011C11.1108 7.17503 10.7831 6.38375 10.1996 5.80034C9.61622 5.21692 8.82494 4.88916 7.99986 4.88916C7.17479 4.88916 6.38351 5.21692 5.80009 5.80034C5.21668 6.38375 4.88892 7.17503 4.88892 8.00011C4.88892 8.82518 5.21668 9.61646 5.80009 10.1999C6.38351 10.7833 7.17479 11.1111 7.99986 11.1111Z"
                            stroke="#FBF9F7" stroke-width="1.10526" stroke-miterlimit="10" stroke-linecap="round" />
                    </svg>

                </button>
            </div>
        </div>

        <div class="px-2 col-md-4">
            <search>
                <form action="#" method="GET" id="searchForm">
                    <label class="searchLabelWrap">
                        <span class="visually-hidden">Search</span>
                        <svg viewBox="0 0 512 512" aria-hidden="true" class="icon" width="
                        20">
                            <path
                                d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z" />
                        </svg>
                        <input type="search" placeholder="Search" class="searchInput" name="s">
                    </label>
                </form>
            </search>
        </div>
    </div>
</template>
