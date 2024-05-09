<div class="p-8 text-gray-500  flex flex-col justify-between h-[85%]">
    <div>
        <ul class="flex flex-col gap-2">
            <li class="hover:bg-gray-200 transition-colors rounded-lg ">
                <a href="/dashboard{{ $current_student ? '?student='.$current_student->id : ''}}" class="flex gap-5 items-center px-3 py-2">
                    @if (request()->is('dashboard', 'mission-progress', 'leaderboard'))
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4"
                                d="M14.685 4.11246L4.57878 12.2062C3.44128 13.1104 2.71211 15.0208 2.96003 16.4499L4.89962 28.0583C5.24962 30.1291 7.23294 31.8062 9.33294 31.8062H25.6663C27.7517 31.8062 29.7496 30.1145 30.0996 28.0583L32.0392 16.4499C32.2725 15.0208 31.5434 13.1104 30.4205 12.2062L20.3142 4.12701C18.7538 2.87284 16.2309 2.87287 14.685 4.11246Z"
                                fill="#0CAFF5" />
                            <path
                                d="M17.4998 22.6042C19.5134 22.6042 21.1457 20.9719 21.1457 18.9583C21.1457 16.9448 19.5134 15.3125 17.4998 15.3125C15.4863 15.3125 13.854 16.9448 13.854 18.9583C13.854 20.9719 15.4863 22.6042 17.4998 22.6042Z"
                                fill="#0CAFF5" />
                        </svg>
                        <p class="text-primary">Dashboard</p>
                    @else
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12.7734 1.92787L2.66716 10.0216C1.52966 10.9258 0.800492 12.8362 1.04841 14.2654L2.98799 25.8737C3.33799 27.9445 5.32133 29.6216 7.42133 29.6216H23.7547C25.8401 29.6216 27.838 27.93 28.188 25.8737L30.1276 14.2654C30.3609 12.8362 29.6317 10.9258 28.5088 10.0216L18.4026 1.94246C16.8422 0.688289 14.3192 0.688289 12.7734 1.92787Z"
                                stroke="#AEAEAE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M15.588 20.4196C16.5549 20.4196 17.4822 20.0355 18.166 19.3518C18.8497 18.668 19.2338 17.7407 19.2338 16.7738C19.2338 15.8068 18.8497 14.8795 18.166 14.1958C17.4822 13.512 16.5549 13.1279 15.588 13.1279C14.621 13.1279 13.6937 13.512 13.01 14.1958C12.3263 14.8795 11.9421 15.8068 11.9421 16.7738C11.9421 17.7407 12.3263 18.668 13.01 19.3518C13.6937 20.0355 14.621 20.4196 15.588 20.4196Z"
                                stroke="#AEAEAE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="">Dashboard</p>
                    @endif


                </a>
            </li>
            <li class="hover:bg-gray-200 transition-colors rounded-lg ">
                <a href="/mission?{{ $current_student ? '?student='.$current_student->id : ''}}" class="flex gap-5 items-center px-3 py-2">
                    @if (request()->is('mission', 'detail-mission', 'create-mission'))
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4"
                                d="M24.8325 0H10.1675C3.7975 0 0 3.7975 0 10.1675V24.8325C0 31.2025 3.7975 35 10.1675 35H24.8325C31.2025 35 35 31.2025 35 24.8325V10.1675C35 3.7975 31.2025 0 24.8325 0Z"
                                fill="#0CAFF5" />
                            <path
                                d="M28.5425 12.0225C28.5425 12.74 27.965 13.335 27.23 13.335H18.0425C17.325 13.335 16.73 12.74 16.73 12.0225C16.73 11.305 17.325 10.71 18.0425 10.71H27.23C27.965 10.71 28.5425 11.305 28.5425 12.0225Z"
                                fill="#0CAFF5" />
                            <path
                                d="M13.9475 10.325L10.01 14.2625C9.74748 14.525 9.41498 14.6475 9.08248 14.6475C8.74998 14.6475 8.39998 14.525 8.15498 14.2625L6.84248 12.95C6.31748 12.4425 6.31748 11.6025 6.84248 11.095C7.34998 10.5875 8.17248 10.5875 8.69748 11.095L9.08248 11.48L12.0925 8.46998C12.6 7.96248 13.4225 7.96248 13.9475 8.46998C14.455 8.97748 14.455 9.81748 13.9475 10.325Z"
                                fill="#0CAFF5" />
                            <path
                                d="M28.5425 24.2725C28.5425 24.99 27.965 25.585 27.23 25.585H18.0425C17.325 25.585 16.73 24.99 16.73 24.2725C16.73 23.555 17.325 22.96 18.0425 22.96H27.23C27.965 22.96 28.5425 23.555 28.5425 24.2725Z"
                                fill="#0CAFF5" />
                            <path
                                d="M13.9475 22.575L10.01 26.5125C9.74748 26.775 9.41498 26.8975 9.08248 26.8975C8.74998 26.8975 8.39998 26.775 8.15498 26.5125L6.84248 25.2C6.31748 24.6925 6.31748 23.8525 6.84248 23.345C7.34998 22.8375 8.17248 22.8375 8.69748 23.345L9.08248 23.73L12.0925 20.72C12.6 20.2125 13.4225 20.2125 13.9475 20.72C14.455 21.2275 14.455 22.0675 13.9475 22.575Z"
                                fill="#0CAFF5" />
                        </svg>
                        <p class="text-primary">Misi</p>
                    @else
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.0396 12.95H25.6959M9.3042 12.95L10.3979 14.0437L13.6792 10.7625M18.0396 23.1583H25.6959M9.3042 23.1583L10.3979 24.252L13.6792 20.9708"
                                stroke="#AEAEAE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M13.125 32.0834H21.875C29.1666 32.0834 32.0833 29.1667 32.0833 21.8751V13.1251C32.0833 5.83341 29.1666 2.91675 21.875 2.91675H13.125C5.83329 2.91675 2.91663 5.83341 2.91663 13.1251V21.8751C2.91663 29.1667 5.83329 32.0834 13.125 32.0834Z"
                                stroke="#AEAEAE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p>Misi</p>
                    @endif

                </a>
            </li>
        </ul>
        <p class="py-4 px-3">Lainnya</p>
        <ul class="flex flex-col gap-2">
            <li class="hover:bg-gray-200 transition-colors rounded-lg">
                <a href="/help?{{ $current_student ? '?student='.$current_student->id : ''}}" class="flex gap-5 items-center px-3 py-2">
                    @if (request()->is('help'))
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4"
                                d="M24.7917 26.877H18.9584L12.4688 31.1937C11.5063 31.8354 10.2084 31.15 10.2084 29.9833V26.877C5.83341 26.877 2.91675 23.9604 2.91675 19.5854V10.8354C2.91675 6.46037 5.83341 3.5437 10.2084 3.5437H24.7917C29.1667 3.5437 32.0834 6.46037 32.0834 10.8354V19.5854C32.0834 23.9604 29.1667 26.877 24.7917 26.877Z"
                                fill="#0CAFF5" />
                            <path
                                d="M17.4999 17.6604C16.902 17.6604 16.4061 17.1646 16.4061 16.5667V16.2605C16.4061 14.5688 17.6457 13.7375 18.1124 13.4167C18.652 13.0521 18.8269 12.8042 18.8269 12.425C18.8269 11.6959 18.2291 11.0979 17.4999 11.0979C16.7707 11.0979 16.1729 11.6959 16.1729 12.425C16.1729 13.023 15.677 13.5188 15.0791 13.5188C14.4812 13.5188 13.9854 13.023 13.9854 12.425C13.9854 10.4855 15.5603 8.9104 17.4999 8.9104C19.4395 8.9104 21.0144 10.4855 21.0144 12.425C21.0144 14.0875 19.7895 14.9188 19.3374 15.225C18.7687 15.6042 18.5936 15.8521 18.5936 16.2605V16.5667C18.5936 17.1792 18.0978 17.6604 17.4999 17.6604Z"
                                fill="#0CAFF5" />
                            <path
                                d="M17.5 21.2917C16.8875 21.2917 16.4062 20.7959 16.4062 20.198C16.4062 19.6001 16.9021 19.1042 17.5 19.1042C18.0979 19.1042 18.5938 19.6001 18.5938 20.198C18.5938 20.7959 18.1125 21.2917 17.5 21.2917Z"
                                fill="#0CAFF5" />
                        </svg>
                        <p class=" text-primary ">Bantuan</p>
                    @else
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.6665 32.5498C11.2582 32.5498 10.8352 32.4478 10.4561 32.2437C9.62481 31.8062 9.11442 30.9311 9.11442 29.9978V27.927C4.71025 27.475 1.82275 24.2373 1.82275 19.5998V10.8499C1.82275 5.83326 5.1915 2.46451 10.2082 2.46451H24.7915C29.8082 2.46451 33.1769 5.83326 33.1769 10.8499V19.5998C33.1769 24.6165 29.8082 27.9853 24.7915 27.9853H19.2936L13.081 32.127C12.6581 32.4041 12.1623 32.5498 11.6665 32.5498ZM10.2082 4.63741C6.44567 4.63741 4.01025 7.07283 4.01025 10.8353V19.5854C4.01025 23.3479 6.44567 25.7833 10.2082 25.7833C10.8061 25.7833 11.3019 26.2792 11.3019 26.8771V29.9833C11.3019 30.1729 11.4186 30.2604 11.4915 30.3041C11.5644 30.3479 11.7103 30.3916 11.8707 30.2895L18.3603 25.9729C18.5353 25.8563 18.754 25.7833 18.9728 25.7833H24.8061C28.5686 25.7833 31.004 23.3479 31.004 19.5854V10.8353C31.004 7.07283 28.5686 4.63741 24.8061 4.63741H10.2082V4.63741Z"
                                fill="#AEAEAE" />
                            <path
                                d="M17.4999 17.6604C16.902 17.6604 16.4061 17.1646 16.4061 16.5667V16.2605C16.4061 14.5688 17.6457 13.7375 18.1124 13.4167C18.652 13.0521 18.8269 12.8042 18.8269 12.425C18.8269 11.6959 18.2291 11.0979 17.4999 11.0979C16.7707 11.0979 16.1729 11.6959 16.1729 12.425C16.1729 13.023 15.677 13.5188 15.0791 13.5188C14.4812 13.5188 13.9854 13.023 13.9854 12.425C13.9854 10.4855 15.5603 8.9104 17.4999 8.9104C19.4395 8.9104 21.0144 10.4855 21.0144 12.425C21.0144 14.0875 19.7895 14.9188 19.3374 15.225C18.7687 15.6042 18.5936 15.8521 18.5936 16.2605V16.5667C18.5936 17.1792 18.0978 17.6604 17.4999 17.6604Z"
                                fill="#AEAEAE" />
                            <path
                                d="M17.5 21.2916C16.8875 21.2916 16.4062 20.7958 16.4062 20.1979C16.4062 19.6 16.9021 19.1041 17.5 19.1041C18.0979 19.1041 18.5938 19.6 18.5938 20.1979C18.5938 20.7958 18.1125 21.2916 17.5 21.2916Z"
                                fill="#AEAEAE" />
                        </svg>
                        <p class="">Bantuan</p>
                    @endif
                </a>
            </li>
            <li class="hover:bg-gray-200 transition-colors rounded-lg ">
                <a href="/setting?{{ $current_student ? '?student='.$current_student->id : ''}}" class="flex gap-5 items-center px-3 py-2">
                    @if (request()->is('setting'))
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.4"
                                d="M2.91675 18.7833V16.2166C2.91675 14.6999 4.15633 13.4458 5.68758 13.4458C8.32716 13.4458 9.40633 11.5791 8.07925 9.28951C7.32091 7.97701 7.773 6.27076 9.10008 5.51243L11.623 4.06868C12.7751 3.38326 14.2626 3.79159 14.948 4.94368L15.1084 5.22076C16.4209 7.51034 18.5792 7.51034 19.9063 5.22076L20.0667 4.94368C20.7522 3.79159 22.2397 3.38326 23.3917 4.06868L25.9147 5.51243C27.2417 6.27076 27.6938 7.97701 26.9355 9.28951C25.6084 11.5791 26.6876 13.4458 29.3272 13.4458C30.8438 13.4458 32.098 14.6853 32.098 16.2166V18.7833C32.098 20.2999 30.8584 21.5541 29.3272 21.5541C26.6876 21.5541 25.6084 23.4208 26.9355 25.7103C27.6938 27.0374 27.2417 28.7291 25.9147 29.4874L23.3917 30.9312C22.2397 31.6166 20.7522 31.2083 20.0667 30.0562L19.9063 29.7791C18.5938 27.4895 16.4355 27.4895 15.1084 29.7791L14.948 30.0562C14.2626 31.2083 12.7751 31.6166 11.623 30.9312L9.10008 29.4874C7.773 28.7291 7.32091 27.0228 8.07925 25.7103C9.40633 23.4208 8.32716 21.5541 5.68758 21.5541C4.15633 21.5541 2.91675 20.2999 2.91675 18.7833Z"
                                fill="#0CAFF5" />
                            <path
                                d="M17.5001 22.2397C20.1177 22.2397 22.2397 20.1177 22.2397 17.5001C22.2397 14.8825 20.1177 12.7605 17.5001 12.7605C14.8825 12.7605 12.7605 14.8825 12.7605 17.5001C12.7605 20.1177 14.8825 22.2397 17.5001 22.2397Z"
                                fill="#0CAFF5" />
                        </svg>
                        <p class="text-primary">Pengaturan</p>
                    @else
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.5 22.9688C14.4813 22.9688 12.0312 20.5188 12.0312 17.5C12.0312 14.4813 14.4813 12.0312 17.5 12.0312C20.5188 12.0312 22.9688 14.4813 22.9688 17.5C22.9688 20.5188 20.5188 22.9688 17.5 22.9688ZM17.5 14.2188C15.6917 14.2188 14.2188 15.6917 14.2188 17.5C14.2188 19.3083 15.6917 20.7813 17.5 20.7813C19.3083 20.7813 20.7813 19.3083 20.7813 17.5C20.7813 15.6917 19.3083 14.2188 17.5 14.2188Z"
                                fill="#AEAEAE" />
                            <path
                                d="M22.1811 32.3604C21.8748 32.3604 21.5686 32.3167 21.2623 32.2438C20.3582 31.9958 19.5998 31.4271 19.1186 30.625L18.9436 30.3333C18.0832 28.8458 16.9019 28.8458 16.0415 30.3333L15.8811 30.6104C15.3998 31.4271 14.6415 32.0104 13.7373 32.2438C12.8186 32.4917 11.8707 32.3604 11.0686 31.8792L8.56025 30.4354C7.67067 29.925 7.029 29.0938 6.75192 28.0875C6.48942 27.0813 6.62067 26.0458 7.13109 25.1563C7.554 24.4125 7.67067 23.7417 7.42275 23.3188C7.17484 22.8958 6.54775 22.6479 5.68734 22.6479C3.55817 22.6479 1.82275 20.9125 1.82275 18.7833V16.2167C1.82275 14.0875 3.55817 12.3521 5.68734 12.3521C6.54775 12.3521 7.17484 12.1042 7.42275 11.6813C7.67067 11.2583 7.56859 10.5875 7.13109 9.84376C6.62067 8.95418 6.48942 7.90418 6.75192 6.91251C7.01442 5.90626 7.65609 5.07501 8.56025 4.56459L11.0832 3.12084C12.7311 2.14376 14.904 2.71251 15.8957 4.38959L16.0707 4.68126C16.9311 6.16876 18.1123 6.16876 18.9728 4.68126L19.1332 4.40418C20.1248 2.71251 22.2978 2.14376 23.9603 3.13543L26.4686 4.57918C27.3582 5.08959 27.9998 5.92084 28.2769 6.92709C28.5394 7.93334 28.4082 8.96876 27.8978 9.85834C27.4748 10.6021 27.3582 11.2729 27.6061 11.6958C27.854 12.1188 28.4811 12.3667 29.3415 12.3667C31.4707 12.3667 33.2061 14.1021 33.2061 16.2313V18.7979C33.2061 20.9271 31.4707 22.6625 29.3415 22.6625C28.4811 22.6625 27.854 22.9104 27.6061 23.3333C27.3582 23.7563 27.4603 24.4271 27.8978 25.1708C28.4082 26.0604 28.554 27.1104 28.2769 28.1021C28.0144 29.1083 27.3728 29.9396 26.4686 30.45L23.9457 31.8938C23.3915 32.2 22.7936 32.3604 22.1811 32.3604ZM17.4998 26.9646C18.7978 26.9646 20.0082 27.7813 20.8394 29.225L20.9998 29.5021C21.1748 29.8083 21.4665 30.0271 21.8165 30.1146C22.1665 30.2021 22.5165 30.1583 22.8082 29.9833L25.3311 28.525C25.7103 28.3063 26.0019 27.9417 26.1186 27.5042C26.2353 27.0667 26.1769 26.6146 25.9582 26.2354C25.1269 24.8063 25.0248 23.3333 25.6665 22.2104C26.3082 21.0875 27.6353 20.4458 29.2978 20.4458C30.2311 20.4458 30.9748 19.7021 30.9748 18.7688V16.2021C30.9748 15.2833 30.2311 14.525 29.2978 14.525C27.6353 14.525 26.3082 13.8833 25.6665 12.7604C25.0248 11.6375 25.1269 10.1646 25.9582 8.73543C26.1769 8.35626 26.2353 7.90418 26.1186 7.46668C26.0019 7.02918 25.7248 6.67918 25.3457 6.44584L22.8228 5.00209C22.1957 4.62293 21.3644 4.84168 20.9853 5.48334L20.8248 5.76043C19.9936 7.20418 18.7832 8.02084 17.4853 8.02084C16.1873 8.02084 14.9769 7.20418 14.1457 5.76043L13.9853 5.46876C13.6207 4.85626 12.804 4.63751 12.1769 5.00209L9.654 6.46043C9.27484 6.67918 8.98317 7.04376 8.8665 7.48126C8.74984 7.91876 8.80817 8.37084 9.02692 8.75001C9.85817 10.1792 9.96025 11.6521 9.31859 12.775C8.67692 13.8979 7.34984 14.5396 5.68734 14.5396C4.754 14.5396 4.01025 15.2833 4.01025 16.2167V18.7833C4.01025 19.7021 4.754 20.4604 5.68734 20.4604C7.34984 20.4604 8.67692 21.1021 9.31859 22.225C9.96025 23.3479 9.85817 24.8208 9.02692 26.25C8.80817 26.6292 8.74984 27.0813 8.8665 27.5188C8.98317 27.9563 9.26025 28.3063 9.63942 28.5396L12.1623 29.9833C12.4686 30.1729 12.8332 30.2167 13.1686 30.1292C13.5186 30.0417 13.8103 29.8083 13.9998 29.5021L14.1603 29.225C14.9915 27.7958 16.2019 26.9646 17.4998 26.9646Z"
                                fill="#AEAEAE" />
                        </svg>
                        <p class="">Pengaturan</p>
                    @endif

                </a>
            </li>
        </ul>
    </div>
    <form action="/logout" method="post">
        @csrf
        <div class="hover:bg-gray-200 transition-colors rounded-lg">
            <button type="submit" class="flex gap-5 items-center px-3 py-2">
                <svg width="35" height="35" viewBox="0 0 35 35" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M25.4334 21.321L29.1667 17.5877L25.4334 13.8543M14.2334 17.5877H29.0646M17.1501 29.1668C10.7042 29.1668 5.4834 24.7918 5.4834 17.5002C5.4834 10.2085 10.7042 5.8335 17.1501 5.8335"
                        stroke="#D9D9D9" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>

                <p class="">Keluar Akun</p>
            </button>
        </div>
    </form>
</div>
