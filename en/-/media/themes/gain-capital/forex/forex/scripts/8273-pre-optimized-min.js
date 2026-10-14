"use strict";
(self.webpackChunkforex_sxa_theme = self.webpackChunkforex_sxa_theme || []).push([
    [8273], {
        8273: (e, t, s) => {
            s.d(t, {
                Z: () => i
            });
            const i = {
                CAREERS: {
                    GET_JOBS_LIST: "/api/Careers/GetJobsList",
                    GET_JOBS: "/api/Careers/GetJobs",
                    GET_FILTERS: "/api/Careers/GetFilters"
                },
                GLOSSARY_TERMS: "/api/glossary/GetGlossaryTermsGrouped",
                REGISTER_COMPLETE_LESSONS: "/api/lessons/RegisterCompleteLesson",
                MARK_LESSON_UNREAD: "/api/lessons/MarkLessonUnread",
                REGISTER_STARTED_LESSONS: "/api/lessons/RegisterStartedLesson",
                CERTIFICATES_PROGRESS: "/api/certificates/GetProgress",
                MI_ARTICLES: {
                    SEARCH_GRID: "/api/searchgrid/getresults/",
                    ARTICLES_BY_TAGS: "/api/mitagarticles/get"
                },
                FAQ_SURVEY: {
                    REGISTER: "/api/faqsurvey/RegisterQuestionVote",
                    COMMENT: "/api/faqsurvey/SaveQuestionComment"
                },
                ACCOUNTS: {
                    GET_ALL: "/api/accounts/GetAccounts",
                    GET_AVAILABLE: "/api/accounts/GetAvailableAccounts",
                    ADD_ACCOUNT: "/api/accounts/AddAccountForComparison",
                    REMOVE_ACCOUNT: "/api/accounts/RemoveAccountFromComparison"
                },
                SITE_SEARCH: {
                    GET_SUGGESTIONS: "/api/sectionsearchbox/GetSuggestions",
                    GET_RESULTS: "/api/sitesearch/GetCategorySearchResults",
                    CLEAR_RECENT: "/api/sitesearch/DeleteSearchHistory"
                },
                RATES: {
                    GET_MARKET_RATES: "/api/MarketRates/GetMarketRates",
                    GET_TYPICAL_SPREADS: "/api/MarketRates/GetTypicalSpreads",
                    GET_PIVOT_POINTS: "/api/MarketRates/InteractivePivots/GetInteractivePivots"
                },
                REGIONS: {
                    GET_COUNTRY_REGIONS: "/api/CountryRegion/GetRegionsByCountryId"
                },
                OFFICES: {
                    GET_COUNTRY_OFFICES: "/api/countryoffices/get",
                    GET_COUNTRY_OFFICES_DROPDOWN: "/api/countryoffices/GetCountries"
                },
                CLIENT_SENTIMENT: {
                    API_URL: "https://insightsclientsentimentapi.svc.cityindex.com/view",
                    TIMESTAMP_URL: "https://insightsclientsentimentapi.svc.cityindex.com/view/latest_timestamp",
                    LAST30DAYS: "https://insightsclientsentimentapi.svc.cityindex.com/view/last_30days_sentiment"
                }
            }
        }
    }
]);