<style scoped>
/* Apply Avenir font family to all elements in this component */
.search-box,
.search-box *,
.search-box span,
.search-box label,
.search-box button,
.search-box .fw-bold {
    font-family: 'Avenir', sans-serif !important;
}

.search-box {
    width: 93%;
    margin: 0 auto;
    padding-top: 15px !important;
    padding-bottom: 15px !important;
}

/* Desktop styles */
.search-box-section {
    border-right: 1px solid #DED1BA;
    padding: 0.5rem 1rem;
}

.search-box-section:last-of-type {
    border-right: none;
}

.search-box-title {
    color: #5B4C3A;
    font-size: 16px;
    font-weight: bold;
}

.search-box-text {
    color: #8A7356;
    font-size: 14px;
    font-weight: 400;
}

.location-text {
    color: #8A7356;
    padding-right: 20px;
}

.location-btn {
    font-size: 10px;
    background-color: #5B4C3A;
    color: white;
    border: none;
    padding: 5px 15px;
    white-space: nowrap;
}

.my-current-location-btn {
    font-size: 9px;
    padding: 4px 12px;
    margin-left: 8px;
}

.my-current-location-btn img {
    width: 10px !important;
    height: 10px !important;
}

.search-here-btn {
    font-size: 14px;
}

.search-submit-btn {
    background-color: #6B5B4E;
    color: #C0B2A4;
    border: none;
    padding: 12px 20px;
    font-weight: 400;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    text-align: left;
}

@media (min-width: 1400px) {
    .search-box-title {
        font-size: 18px;
        font-weight: bold;
    }

    .search-box input.form-control {
        font-size: 16px;
        padding: 10px 15px;
    }

    .location-text {
        font-size: 16px;
        padding: 10px 15px;
    }

    .search-submit-btn {
        font-size: 16px;
        padding: 14px 24px;
    }

    .my-current-location-btn {
        font-size: 14px;
        font-weight: 300;
        padding: 5px 14px;
        margin-left: 8px;
    }

    .my-current-location-btn img {
        width: 15px !important;
        height: 15px !important;
    }
}

/* Mobile responsive styles */
@media (max-width: 768px) {
    .search-box {
        padding: 1rem !important;
    }

    .search-box-section {
        border-right: none !important;
        border-bottom: 1px solid #DED1BA;
        padding: 1rem 0.5rem !important;
        margin-bottom: 0.5rem;
    }

    .search-box-section:last-of-type {
        border-bottom: none;
    }

    .search-box-title {
        font-size: 14px;
    }

    .search-box-text {
        font-size: 12px;
    }

    .location-wrapper {
        justify-content: flex-start;
    }

    .location-text {
        padding-right: 10px;
        font-size: 13px;
    }

    .location-btn {
        font-size: 9px;
        padding: 4px 12px;
    }

    .search-button-wrapper {
        padding: 0.5rem 0.5rem !important;
        margin-top: 0.5rem;
    }

    .search-submit-btn {
        padding: 10px 15px;
        font-size: 14px;
    }
}

/* Extra small devices */
@media (max-width: 480px) {
    .search-box {
        border-radius: 15px !important;
    }

    .search-box-title {
        font-size: 13px;
    }

    .search-box-text {
        font-size: 11px;
    }

    .location-btn {
        font-size: 8px;
        padding: 3px 10px;
    }

    .location-btn img {
        width: 10px !important;
        height: 10px !important;
    }

    .search-submit-btn {
        padding: 8px 12px;
        font-size: 13px;
    }

    .search-submit-btn img {
        width: 14px !important;
        height: 14px !important;
    }
}

@media (min-width: 1600px) {
    .my-current-location-btn {
        font-size: 8px;
        padding: 3px 10px;
    }

    .my-current-location-btn img {
        width: 9px !important;
        height: 9px !important;
    }
}

@media (min-width: 1700px) {
    .location-input-wrapper {
        gap: 4px !important;
    }

    .location-text {
        font-size: 13px;
        padding: 8px 12px;
    }

    .my-current-location-btn {
        font-size: 11px;
        padding: 6px 14px;
    }

    .my-current-location-btn img {
        width: 14px !important;
        height: 14px !important;
    }
}

/* Filter Toggle Button */
.filter-toggle-wrapper {
    margin-bottom: 0;
    margin-top: -15px;
    margin-left: 50px;
    position: relative;
    z-index: 5;
}

.filter-toggle-btn {
    display: flex;
    align-items: center;
    gap: 8px;
    font-family: 'Avenir', sans-serif;
    font-size: 14px;
    font-weight: 500;
    color: #5B4C3A;
    background: white;
    border: 1px solid #DED1BA;
    border-radius: 12px;
    padding: 10px 18px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.03);
}

.filter-toggle-btn:hover {
    background: #FBF9F7;
    border-color: #8A7356;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    transform: translateY(-1px);
}

.filter-toggle-icon {
    color: #5B4C3A;
    flex-shrink: 0;
}

.filter-toggle-text {
    font-weight: 600;
    letter-spacing: 0.3px;
}

.filter-arrow-icon {
    color: #5B4C3A;
    transition: transform 0.3s ease;
    flex-shrink: 0;
}

.filter-arrow-icon.rotated {
    transform: rotate(180deg);
}

/* Transition Animation */
.filters-slide-enter-active {
    transition: all 0.3s ease;
    overflow: hidden;
}

.filters-slide-leave-active {
    transition: all 0.3s ease;
    overflow: hidden;
}

.filters-slide-enter-from {
    opacity: 0;
    transform: translateY(-10px);
    margin-top: 0;
}

.filters-slide-enter-to {
    opacity: 1;
    transform: translateY(0);
}

.filters-slide-leave-from {
    opacity: 1;
    transform: translateY(0);
}

.filters-slide-leave-to {
    opacity: 0;
    transform: translateY(-10px);
    margin-top: 0;
}

/* Modern Filters Container - Grid Layout */
.filters-container {
    background: white;
    border-radius: 16px;
    padding: 14px 16px;
    width: 91%;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
    border: 1px solid #DED1BA;
    margin: 12px auto 0;
}

.filters-grid-wrapper {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
    width: 100%;
    align-items: stretch;
}

.filter-item-compact {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #FBF9F7;
    border: 1px solid #DED1BA;
    border-radius: 12px;
    padding: 10px 12px;
    width: 100%;
    min-height: 44px;
    transition: all 0.3s ease;
    white-space: nowrap;
    box-sizing: border-box;
    position: relative;
    z-index: 10;
}

.custom-dropdown.dropdown-open {
    z-index: 40;
}

.filter-item-compact:hover {
    border-color: #8A7356;
    background: #F5F1E8;
    box-shadow: 0 1px 3px rgba(91, 76, 58, 0.06);
    transform: translateY(-1px);
}

/* Custom Dropdown Styles */
.custom-dropdown {
    position: relative;
    z-index: 10;
}

.custom-dropdown-wrapper {
    position: relative;
    flex: 1;
    min-width: 0;
    z-index: 10;
}

.custom-dropdown-trigger {
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    width: 100%;
}

.dropdown-text {
    font-family: 'Avenir', sans-serif;
    font-size: 12px;
    color: #2E2D29;
    flex: 1;
    min-width: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.dropdown-arrow {
    flex-shrink: 0;
    margin-left: 8px;
    transition: transform 0.3s ease;
}

.dropdown-arrow.rotated {
    transform: rotate(180deg);
}

.custom-dropdown-menu {
    position: absolute;
    top: calc(100% + 4px);
    left: 0;
    right: 0;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    z-index: 50;
    overflow: hidden;
    min-width: 200px;
}

.dropdown-header {
    background: #5B4C3A;
    color: white;
    font-family: 'Avenir', sans-serif;
    font-size: 13px;
    font-weight: 600;
    padding: 12px 16px;
    text-align: left;
    border: none;
}

.dropdown-options {
    max-height: 250px;
    overflow-y: auto;
}

.dropdown-option {
    font-family: 'Avenir', sans-serif;
    font-size: 13px;
    color: #2E2D29;
    padding: 12px 16px;
    cursor: pointer;
    transition: background-color 0.2s ease;
    text-align: left;
    border: none;
    background: white;
}

.dropdown-option:hover {
    background: #FBF9F7;
    color: #5B4C3A;
}

.dropdown-option.selected {
    background: #F5F1E8;
    color: #5B4C3A;
    font-weight: 500;
}

/* Dropdown Transition */
.dropdown-fade-enter-active,
.dropdown-fade-leave-active {
    transition: all 0.2s ease;
}

.dropdown-fade-enter-from {
    opacity: 0;
    transform: translateY(-10px);
}

.dropdown-fade-enter-to {
    opacity: 1;
    transform: translateY(0);
}

.dropdown-fade-leave-from {
    opacity: 1;
    transform: translateY(0);
}

.dropdown-fade-leave-to {
    opacity: 0;
    transform: translateY(-10px);
}

.filter-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #5B4C3A;
    flex-shrink: 0;
    width: 16px;
    height: 16px;
    line-height: 1;
}

.filter-icon svg {
    width: 100%;
    height: 100%;
    display: block;
}

.filter-action-buttons {
    display: flex;
    gap: 12px;
    width: 100%;
    grid-column: 1 / -1;
}

.btn-apply-filters {
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Avenir', sans-serif;
    font-size: 14px;
    font-weight: 600;
    color: white;
    background: #5B4C3A;
    border: 1px solid #5B4C3A;
    border-radius: 12px;
    padding: 12px 24px;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
    flex: 1;
    min-height: 44px;
    box-sizing: border-box;
}

.btn-apply-filters:hover {
    background: #4A3D2F;
    border-color: #4A3D2F;
    transform: translateY(-1px);
    box-shadow: 0 1px 3px rgba(91, 76, 58, 0.1);
}

.btn-clear-filters {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    font-family: 'Avenir', sans-serif;
    font-size: 14px;
    font-weight: 500;
    color: #8A7356;
    background: #FBF9F7;
    border: 1px solid #DED1BA;
    border-radius: 12px;
    padding: 12px 24px;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
    flex: 1;
    min-height: 44px;
    box-sizing: border-box;
}

.btn-clear-filters svg {
    color: #8A7356;
    flex-shrink: 0;
}

.btn-clear-filters:hover {
    background: #F5F1E8;
    border-color: #8A7356;
    color: #5B4C3A;
}

.btn-clear-filters:hover svg {
    color: #5B4C3A;
}

/* Responsive Styles for Filters */
@media (max-width: 992px) {
    .filters-container {
        padding: 14px 16px;
    }

    .filters-grid-wrapper {
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
    }
}

@media (max-width: 768px) {
    .filter-toggle-btn {
        font-size: 13px;
        padding: 8px 15px;
        gap: 6px;
    }

    .filter-toggle-icon {
        width: 16px;
        height: 16px;
    }

    .filter-arrow-icon {
        width: 12px;
        height: 12px;
    }

    .filters-container {
        padding: 12px 14px;
        border-radius: 12px;
    }

    .filters-grid-wrapper {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }

    .btn-apply-filters,
    .btn-clear-filters {
        font-size: 12px;
        padding: 10px 14px;
        min-height: 44px;
    }
}

@media (max-width: 576px) {
    .filters-container {
        padding: 12px;
    }

    .filters-grid-wrapper {
        grid-template-columns: repeat(2, 1fr);
        gap: 8px;
    }
}

@media (max-width: 480px) {
    .filter-toggle-btn {
        font-size: 12px;
        padding: 7px 12px;
        gap: 5px;
    }

    .filter-toggle-text {
        font-size: 12px;
    }

    .filters-grid-wrapper {
        grid-template-columns: 1fr;
        gap: 8px;
    }

    .btn-apply-filters,
    .btn-clear-filters {
        font-size: 12px;
        padding: 10px 12px;
        min-height: 42px;
    }
}

/* Selected Filter Tags */
.selected-filters-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    align-items: center;
}

.filter-tag-item {
    display: flex;
    align-items: center;
    gap: 6px;
    background: transparent;
}

.filter-tag-item svg {
    flex-shrink: 0;
}

.tagb {
    font-family: 'Avenir', sans-serif;
    font-size: 12px;
    font-weight: 500;
    color: #2E2D29;
    line-height: 1;
}
</style>

<template>
    <form @submit.prevent="searchDoctor">
        <div class="row search-box bg-white p-3 mb-5 d-flex align-items-center" style="border-radius: 20px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03); background-color: red;">
            <!-- Concern or Practice -->
            <div class="col-12 col-md-4 text-start search-box-section">
                <div class="d-flex flex-column">
                    <span class=" mb-1 search-box-title">What support are you looking for?</span>
                    <input type="text" v-model="form.modality" class="form-control border-0 shadow-none"
                        placeholder="Find a healer near you or book online sessions from anywhere in the world." />
                </div>
            </div>

            <!-- Locations -->
            <div class="col-12 col-md-5 text-start search-box-section">
                <div class="d-flex flex-column">
                    <label class="form-label  mb-0 text-start search-box-title">Locations</label>
                    <div class="d-flex align-items-center gap-2 location-input-wrapper" style="flex-wrap: nowrap;">
                        <input type="text" v-model="form.location" class="location-text form-control border-0 shadow-none" placeholder="Anywhere / Online" style="width: 200px; flex-shrink: 0;" />
                        <button type="button" class="rounded-pill btn-sm location-btn current-location-btn my-current-location-btn flex-shrink-0" @click="getCurrentLocation">
                            My Current Location
                            <img :src="Location" alt="Location" class="ms-1" style="width: 12px; height: 12px; filter: brightness(0) invert(1);">
                        </button>
                    </div>
                </div>
            </div>

            <!-- Search Button -->
            <div class="px-2 col-12 col-md-3 search-button-wrapper">
                <button type="submit" class=" w-100 rounded-pill search-submit-btn search-here-btn">
                    <img :src="searchIcon" alt="Search" class="me-2" style="width: 16px; height: 16px;">
                    Search here...
                </button>
            </div>
        </div>

        <!-- Filter Toggle Button -->
        <div class="filter-toggle-wrapper d-flex justify-content-start">
            <button type="button" @click="toggleFilters" class="filter-toggle-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="filter-toggle-icon">
                    <line x1="4" y1="21" x2="4" y2="14"></line>
                    <line x1="4" y1="10" x2="4" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12" y2="3"></line>
                    <line x1="20" y1="21" x2="20" y2="16"></line>
                    <line x1="20" y1="12" x2="20" y2="3"></line>
                    <line x1="1" y1="14" x2="7" y2="14"></line>
                    <line x1="9" y1="8" x2="15" y2="8"></line>
                    <line x1="17" y1="16" x2="23" y2="16"></line>
                </svg>
                <span class="filter-toggle-text">Filters</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="filter-arrow-icon" :class="{ 'rotated': showFilters }">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </button>
        </div>

        <!-- Advanced Filters Section -->
        <transition name="filters-slide">
            <div v-show="showFilters" class="filters-container mt-3">
                <div class="filters-grid-wrapper">
                    <!-- Type of Support -->

                    <div class="filter-item-compact custom-dropdown"
                        :class="{ 'dropdown-open': openDropdown === 'modalityType' }" @click.stop>
                        <div class="filter-icon"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 2L2 7l10 5 10-5-10-5z"></path>
                                <path d="M2 17l10 5 10-5"></path>
                                <path d="M2 12l10 5 10-5"></path>
                            </svg> </div>
                        <div class="custom-dropdown-wrapper">
                            <div class="custom-dropdown-trigger" @click="toggleDropdown('modalityType')"> <span
                                    class="dropdown-text">{{ getDisplayText('modalityType') }}</span> <svg
                                    xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6"
                                    class="dropdown-arrow" :class="{ 'rotated': openDropdown === 'modalityType' }">
                                    <path d="M1 1L5 5L9 1" stroke="#5B4C3A" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg> </div>
                            <transition name="dropdown-fade">
                                <div v-show="openDropdown === 'modalityType'" class="custom-dropdown-menu">
                                    <div class="dropdown-header">{{ filterOptions.modalityType.label }}</div>
                                    <div class="dropdown-options">
                                        <div v-for="option in filterOptions.modalityType.options" :key="option.value"
                                            class="dropdown-option"
                                            :class="{ 'selected': form.modalityType === option.value }"
                                            @click="selectOption('modalityType', option.value)"> {{ option.label }}
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>
                    <!-- Location / Online Availability -->
                    <div class="filter-item-compact custom-dropdown"
                        :class="{ 'dropdown-open': openDropdown === 'availability' }" @click.stop>
                        <div class="filter-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div class="custom-dropdown-wrapper">
                            <div class="custom-dropdown-trigger" @click="toggleDropdown('availability')">
                                <span class="dropdown-text">{{ getDisplayText('availability') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6"
                                    class="dropdown-arrow" :class="{ 'rotated': openDropdown === 'availability' }">
                                    <path d="M1 1L5 5L9 1" stroke="#5B4C3A" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <transition name="dropdown-fade">
                                <div v-show="openDropdown === 'availability'" class="custom-dropdown-menu">
                                    <div class="dropdown-header">{{ filterOptions.availability.label }}</div>
                                    <div class="dropdown-options">
                                        <div v-for="option in filterOptions.availability.options" :key="option.value"
                                            class="dropdown-option"
                                            :class="{ 'selected': form.availability === option.value }"
                                            @click="selectOption('availability', option.value)">
                                            {{ option.label }}
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>

                    <!-- Session Duration -->
                    <div class="filter-item-compact custom-dropdown"
                        :class="{ 'dropdown-open': openDropdown === 'duration' }" @click.stop>
                        <div class="filter-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                        </div>
                        <div class="custom-dropdown-wrapper">
                            <div class="custom-dropdown-trigger" @click="toggleDropdown('duration')">
                                <span class="dropdown-text">{{ getDisplayText('duration') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6"
                                    class="dropdown-arrow" :class="{ 'rotated': openDropdown === 'duration' }">
                                    <path d="M1 1L5 5L9 1" stroke="#5B4C3A" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <transition name="dropdown-fade">
                                <div v-show="openDropdown === 'duration'" class="custom-dropdown-menu">
                                    <div class="dropdown-header">{{ filterOptions.duration.label }}</div>
                                    <div class="dropdown-options">
                                        <div v-for="option in filterOptions.duration.options" :key="option.value"
                                            class="dropdown-option"
                                            :class="{ 'selected': form.duration === option.value }"
                                            @click="selectOption('duration', option.value)">
                                            {{ option.label }}
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>

                    <!-- Price per session -->
                    <div class="filter-item-compact custom-dropdown"
                        :class="{ 'dropdown-open': openDropdown === 'price' }" @click.stop>
                        <div class="filter-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <div class="custom-dropdown-wrapper">
                            <div class="custom-dropdown-trigger" @click="toggleDropdown('price')">
                                <span class="dropdown-text">{{ getDisplayText('price') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6"
                                    class="dropdown-arrow" :class="{ 'rotated': openDropdown === 'price' }">
                                    <path d="M1 1L5 5L9 1" stroke="#5B4C3A" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <transition name="dropdown-fade">
                                <div v-show="openDropdown === 'price'" class="custom-dropdown-menu">
                                    <div class="dropdown-header">{{ filterOptions.price.label }}</div>
                                    <div class="dropdown-options">
                                        <div v-for="option in filterOptions.price.options" :key="option.value"
                                            class="dropdown-option" :class="{ 'selected': form.price === option.value }"
                                            @click="selectOption('price', option.value)">
                                            {{ option.label }}
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>

                    <!-- Gender -->
                    <div class="filter-item-compact custom-dropdown"
                        :class="{ 'dropdown-open': openDropdown === 'gender' }" @click.stop>
                        <div class="filter-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </div>
                        <div class="custom-dropdown-wrapper">
                            <div class="custom-dropdown-trigger" @click="toggleDropdown('gender')">
                                <span class="dropdown-text">{{ getDisplayText('gender') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6"
                                    class="dropdown-arrow" :class="{ 'rotated': openDropdown === 'gender' }">
                                    <path d="M1 1L5 5L9 1" stroke="#5B4C3A" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <transition name="dropdown-fade">
                                <div v-show="openDropdown === 'gender'" class="custom-dropdown-menu">
                                    <div class="dropdown-header">{{ filterOptions.gender.label }}</div>
                                    <div class="dropdown-options">
                                        <div v-for="option in filterOptions.gender.options" :key="option.value"
                                            class="dropdown-option"
                                            :class="{ 'selected': form.gender === option.value }"
                                            @click="selectOption('gender', option.value)">
                                            {{ option.label }}
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>

                    <!-- Language -->
                    <div class="filter-item-compact custom-dropdown"
                        :class="{ 'dropdown-open': openDropdown === 'language' }" @click.stop>
                        <div class="filter-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="2" y1="12" x2="22" y2="12"></line>
                                <path
                                    d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                                </path>
                            </svg>
                        </div>
                        <div class="custom-dropdown-wrapper">
                            <div class="custom-dropdown-trigger" @click="toggleDropdown('language')">
                                <span class="dropdown-text">{{ getDisplayText('language') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6"
                                    class="dropdown-arrow" :class="{ 'rotated': openDropdown === 'language' }">
                                    <path d="M1 1L5 5L9 1" stroke="#5B4C3A" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <transition name="dropdown-fade">
                                <div v-show="openDropdown === 'language'" class="custom-dropdown-menu">
                                    <div class="dropdown-header">{{ filterOptions.language.label }}</div>
                                    <div class="dropdown-options">
                                        <div v-for="option in filterOptions.language.options" :key="option.value"
                                            class="dropdown-option"
                                            :class="{ 'selected': form.language === option.value }"
                                            @click="selectOption('language', option.value)">
                                            {{ option.label }}
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>

                    <!-- Accessibility -->
                    <div class="filter-item-compact custom-dropdown"
                        :class="{ 'dropdown-open': openDropdown === 'accessibility' }" @click.stop>
                        <div class="filter-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                </path>
                                <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                <line x1="12" y1="22.08" x2="12" y2="12"></line>
                            </svg>
                        </div>
                        <div class="custom-dropdown-wrapper">
                            <div class="custom-dropdown-trigger" @click="toggleDropdown('accessibility')">
                                <span class="dropdown-text">{{ getDisplayText('accessibility') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6"
                                    class="dropdown-arrow" :class="{ 'rotated': openDropdown === 'accessibility' }">
                                    <path d="M1 1L5 5L9 1" stroke="#5B4C3A" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <transition name="dropdown-fade">
                                <div v-show="openDropdown === 'accessibility'" class="custom-dropdown-menu">
                                    <div class="dropdown-header">{{ filterOptions.accessibility.label }}</div>
                                    <div class="dropdown-options">
                                        <div v-for="option in filterOptions.accessibility.options" :key="option.value"
                                            class="dropdown-option"
                                            :class="{ 'selected': form.accessibility === option.value }"
                                            @click="selectOption('accessibility', option.value)">
                                            {{ option.label }}
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>

                    <!-- Certifications -->
                    <div class="filter-item-compact custom-dropdown"
                        :class="{ 'dropdown-open': openDropdown === 'certification' }" @click.stop>
                        <div class="filter-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <div class="custom-dropdown-wrapper">
                            <div class="custom-dropdown-trigger" @click="toggleDropdown('certification')">
                                <span class="dropdown-text">{{ getDisplayText('certification') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6"
                                    class="dropdown-arrow" :class="{ 'rotated': openDropdown === 'certification' }">
                                    <path d="M1 1L5 5L9 1" stroke="#5B4C3A" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <transition name="dropdown-fade">
                                <div v-show="openDropdown === 'certification'" class="custom-dropdown-menu">
                                    <div class="dropdown-header">{{ filterOptions.certification.label }}</div>
                                    <div class="dropdown-options">
                                        <div v-for="option in filterOptions.certification.options" :key="option.value"
                                            class="dropdown-option"
                                            :class="{ 'selected': form.certification === option.value }"
                                            @click="selectOption('certification', option.value)">
                                            {{ option.label }}
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>

                    <!-- Rating -->
                    <div class="filter-item-compact custom-dropdown"
                        :class="{ 'dropdown-open': openDropdown === 'rating' }" @click.stop>
                        <div class="filter-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <polygon
                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                </polygon>
                            </svg>
                        </div>
                        <div class="custom-dropdown-wrapper">
                            <div class="custom-dropdown-trigger" @click="toggleDropdown('rating')">
                                <span class="dropdown-text">{{ getDisplayText('rating') }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="6" viewBox="0 0 10 6"
                                    class="dropdown-arrow" :class="{ 'rotated': openDropdown === 'rating' }">
                                    <path d="M1 1L5 5L9 1" stroke="#5B4C3A" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <transition name="dropdown-fade">
                                <div v-show="openDropdown === 'rating'" class="custom-dropdown-menu">
                                    <div class="dropdown-header">{{ filterOptions.rating.label }}</div>
                                    <div class="dropdown-options">
                                        <div v-for="option in filterOptions.rating.options" :key="option.value"
                                            class="dropdown-option"
                                            :class="{ 'selected': form.rating === option.value }"
                                            @click="selectOption('rating', option.value)">
                                            {{ option.label }}
                                        </div>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>

                    <!-- Filter Action Buttons -->
                    <div class="filter-action-buttons">
                        <button type="button" @click="applyFilters" class="btn-apply-filters">
                            Apply Filters
                        </button>
                        <button type="button" @click="clearFilters" class="btn-clear-filters">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                            Clear
                        </button>
                    </div>
                </div>
            </div>
        </transition>
    </form>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { useRouter } from "vue-router";
import searchIcon from "../../../public/asset/images/Searchicon.svg";
import Location from "../../../public/asset/images/Location.svg";

const router = useRouter();
const showFilters = ref(false);
const openDropdown = ref(null);

const toggleFilters = () => {
    showFilters.value = !showFilters.value;
};

const toggleDropdown = (filterName) => {
    if (openDropdown.value === filterName) {
        openDropdown.value = null;
    } else {
        openDropdown.value = filterName;
    }
};

const closeDropdown = () => {
    openDropdown.value = null;
};

const selectOption = (filterName, value) => {
    form.value[filterName] = value;
    closeDropdown();
};

// Close dropdown when clicking outside
onMounted(() => {
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.custom-dropdown')) {
            closeDropdown();
        }
    });
});



// Filter options configuration
const filterOptions = {
    modalityType: {
        label: "Type of Support",
        options: [
            { value: "", label: "Type of Support" },
            { value: "counselling", label: "Counselling" },
            { value: "energy-healing", label: "Energy Healing" },
            { value: "nutrition", label: "Nutrition" },
            { value: "acupuncture", label: "Acupuncture" },
            { value: "massage", label: "Massage" },
            { value: "yoga", label: "Yoga" },
            { value: "meditation", label: "Meditation" },
            { value: "reiki", label: "Reiki" },
        ]
    },
    availability: {
        label: "Location",
        options: [
            { value: "", label: "Location" },
            { value: "online", label: "Online Only" },
            { value: "inperson", label: "In-Person" },
            { value: "both", label: "Both" },
        ]
    },
    duration: {
        label: "Duration",
        options: [
            { value: "", label: "Duration" },
            { value: "15", label: "15 Min" },
            { value: "30", label: "30 Min" },
            { value: "45", label: "45 Min" },
            { value: "60", label: "60 Min" },
            { value: "90", label: "90 Min" },
        ]
    },
    price: {
        label: "Price",
        options: [
            { value: "", label: "Price" },
            { value: "0-50", label: "$0-$50" },
            { value: "50-100", label: "$50-$100" },
            { value: "100-150", label: "$100-$150" },
            { value: "150-200", label: "$150-$200" },
            { value: "200+", label: "$200+" },
        ]
    },
    gender: {
        label: "Gender",
        options: [
            { value: "", label: "Gender" },
            { value: "male", label: "Male" },
            { value: "female", label: "Female" },
            { value: "non-binary", label: "Non-Binary" },
        ]
    },
    language: {
        label: "Language",
        options: [
            { value: "", label: "Language" },
            { value: "english", label: "English" },
            { value: "spanish", label: "Spanish" },
            { value: "french", label: "French" },
            { value: "german", label: "German" },
        ]
    },
    accessibility: {
        label: "Accessibility",
        options: [
            { value: "", label: "Accessibility" },
            { value: "wheelchair", label: "Wheelchair" },
            { value: "sign-language", label: "Sign Language" },
            { value: "both-access", label: "Both" },
        ]
    },
    certification: {
        label: "Certifications",
        options: [
            { value: "", label: "Certifications" },
            { value: "certified", label: "Certified" },
            { value: "licensed", label: "Licensed" },
            { value: "accredited", label: "Accredited" },
        ]
    },
    rating: {
        label: "Rating",
        options: [
            { value: "", label: "Rating" },
            { value: "5", label: "5 Stars" },
            { value: "4", label: "4+ Stars" },
            { value: "3", label: "3+ Stars" },
        ]
    },
};

const getDisplayText = (filterName) => {
    const selected = form.value[filterName];
    if (!selected) return filterOptions[filterName].label;
    const option = filterOptions[filterName].options.find(opt => opt.value === selected);
    return option ? option.label : filterOptions[filterName].label;
};

const form = ref({
    modality: null,
    location: null,
    modalityType: null,
    availability: null,
    duration: null,
    price: null,
    gender: null,
    language: null,
    accessibility: null,
    certification: null,
    rating: null,
});

const searchDoctor = () => {
    const query = {};
    if (form.value.modality) query.modality = form.value.modality;
    if (form.value.location) query.location = form.value.location;
    if (form.value.modalityType) query.modalityType = form.value.modalityType;
    if (form.value.availability) query.availability = form.value.availability;
    if (form.value.duration) query.duration = form.value.duration;
    if (form.value.price) query.price = form.value.price;
    if (form.value.gender) query.gender = form.value.gender;
    if (form.value.language) query.language = form.value.language;
    if (form.value.accessibility) query.accessibility = form.value.accessibility;
    if (form.value.certification) query.certification = form.value.certification;
    if (form.value.rating) query.rating = form.value.rating;

    router.push({
        name: "Searchdoctorpage",
        query: query,
    });
};

const applyFilters = () => {
    searchDoctor();
    closeDropdown();
};

const clearFilters = () => {
    form.value = {
        modality: "",
        location: "",
        modalityType: "",
        availability: "",
        duration: "",
        price: "",
        gender: "",
        language: "",
        accessibility: "",
        certification: "",
        rating: "",
    };
    closeDropdown();
};

const getCurrentLocation = () => {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            async (position) => {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                // Optional: Use reverse geocoding to get city name
                try {
                    const res = await fetch(
                        `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`
                    );
                    const data = await res.json();
                    form.value.location = data.address.city || data.address.town || data.display_name;
                } catch (err) {
                    form.value.location = `${lat}, ${lon}`; // fallback
                }
            },
            (error) => {
                alert("Unable to fetch your location. Please allow location access.");
            }
        );
    } else {
        alert("Geolocation is not supported by this browser.");
    }
};
</script>
