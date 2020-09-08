<div class="col-lg-3 order-2 order-lg-1">
    <div class="filter-widget">
        <h2 class="fw-title">Categories</h2>
        <ul class="category-menu">
            @foreach($categories as $category)
            <li><a href="{{ route('category.products',$category->slug) }}">{{$category->title}}</a>

                <ul class="sub-menu">
                    @foreach($category->children as $subCategory)
                    <li><a href="{{ route('category.products',$subCategory->slug) }}">{{$subCategory->title}}</a>
                    </li>

                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="filter-widget mb-0">
        <h2 class="fw-title">Filter by</h2>
        <div class="price-range-wrap">
            <h4>Price</h4>
            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                data-min="1" data-max="1000">
                <div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;">
                </div>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
                </span>
                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
                </span>
            </div>
            <div class="range-slider">
                <div class="price-input">
                    <input type="text" id="minamount">
                    <input type="text" id="maxamount">
                </div>
            </div>
        </div>
    </div>
    @if($attributeOption)
    @foreach ($attributeOption as $key => $value)
    <div class="filter-widget mb-0">
        <h2 class="fw-title">{{$key}} by</h2>
        <div class="fw-color-choose">
            @foreach($value as $attr)
            <div class="cs-item">
                <span class="badge badge-secondary variant" style="cursor:pointer"
                    data-attroptionvariant={{$attr->options}}>{{$attr->options}}</span>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
    @endif
    <div class="filter-widget">
        <h2 class="fw-title">Brand</h2>
        <ul class="category-menu">
            <li><a href="#">Abercrombie & Fitch <span>(2)</span></a></li>
            <li><a href="#">Asos<span>(56)</span></a></li>
            <li><a href="#">Bershka<span>(36)</span></a></li>
            <li><a href="#">Missguided<span>(27)</span></a></li>
            <li><a href="#">Zara<span>(19)</span></a></li>
        </ul>
    </div>
</div>