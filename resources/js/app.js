function portfolio_operation(){
    $.ajax({
        url: 'http://localhost:3000/resume/public/api/protfoilo/0',
        success: function(res){
            $('.gallery_zoom').empty()
            res.map(value =>{
                $('.gallery_zoom').append(`
                    <li class="grid-item">
                        <div class="inner">
                            <div class="entry">
                                <a href="tmp/portfoilo/${value.image_path}" target="_blank">
                                    <img src="tmp/portfoilo/${value.image_path}" class="invisible" alt="" />
                                    <div class="main" style="background-image: url(&quot;tmp/portfoilo/${value.image_path}&quot;);"></div>
                                    <div class="mobile_title">
                                        <h3>${value.title}</h3>
                                        <span>${value.categoryTitle}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                `)
            })
        }
    })
    $('.portfolio_filter > ul > li > a').on('click',function(el){
        const categoreyId = el.target.dataset.categoreyId;
        $.ajax({
            url: 'http://localhost:3000/resume/public/api/protfoilo/'+categoreyId,
            success: function(res){
                $('.gallery_zoom').empty()
                res.map(value =>{
                    $('.gallery_zoom').append(`
                        <li class="grid-item">
                            <div class="inner">
                                <div class="entry">
                                    <a href="tmp/portfoilo/${value.image_path}" target="_blank">
                                        <img src="tmp/portfoilo/${value.image_path}" class="invisible" alt="" />
                                        <div class="main" style="background-image: url(&quot;tmp/portfoilo/${value.image_path}&quot;);"></div>
                                        <div class="mobile_title">
                                            <h3>${value.title}</h3>
                                            <span>${value.categoryTitle}</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                    `)
                })
            }
        })

    })
}

portfolio_operation()
