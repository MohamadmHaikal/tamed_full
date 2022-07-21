

import { createWebHistory, createRouter } from "vue-router";

// All Pages
import HomeDemoOne from "./components/pages/HomeDemoOne";
import HomeDemoTwo from "./components/pages/HomeDemoTwo";
import HomeDemoThree from "./components/pages/HomeDemoThree";
import HomeDemoFive from "./components/pages/HomeDemoFive";
import HomeDemoSix from "./components/pages/HomeDemoSix";
import AboutUs from "./components/pages/AboutUs";
import FeaturesOne from "./components/pages/FeaturesOne";
import FeaturesTwo from "./components/pages/FeaturesTwo";
import Team from "./components/pages/Team";
import Pricing from "./components/pages/Pricing";
import Login from "./components/pages/Login";
import Register from "./components/pages/Register";
import Error from "./components/pages/Error";
import Faq from "./components/pages/Faq";
import BlogOne from "./components/pages/BlogOne";
import BlogTwo from "./components/pages/BlogTwo";
import BlogThree from "./components/pages/BlogThree";
import Contact from "./components/pages/Contact";
import PrivacyPolicy from "./components/pages/PrivacyPolicy";
import UsagePolicy from "./components/pages/UsagePolicy";
import TermsCondition from "./components/pages/TermsCondition";
import Projects from "./components/pages/Projects";
import BlogDetails from "./components/pages/BlogDetails";
import DealsAuctions from "./components/pages/DealsAuctions";
import Profile from "./components/pages/Profile";
import ProjectDetails from "./components/pages/ProjectDetails";
import DealsAuctionsDetails from "./components/pages/DealsAuctionsDetails";
import SubmitQuotes from "./components/pages/SubmitQuotes";
import ContractForms from "./components/pages/ContractForms";
import GuideManual from "./components/pages/GuideManual";
import Jobs from "./components/pages/Jobs";
import Technique from "./components/pages/Technique";
import FactoryMaterials from "./components/pages/FactoryMaterials";
import RawMaterials from "./components/pages/RawMaterials";
import Equipment from "./components/pages/Equipment";
const routes = [
  {
    path: "/", component: HomeDemoOne,
    meta: {
      title: window.site.site_name + ' - ' + 'الصفحة الرئيسية',
    }
  },
  { path: "/home-demo-two", component: HomeDemoTwo },
  { path: "/home-demo-three", component: HomeDemoThree },
  { path: "/home-demo-five", component: HomeDemoFive },
  { path: "/home-demo-six", component: HomeDemoSix },
  {
    path: "/about-us", component: AboutUs,
    meta: {
      title: window.site.site_name + ' - ' + 'عن تعميد',
    }
  },
  { path: "/features-1", component: FeaturesOne },
  { path: "/features-2", component: FeaturesTwo },
  { path: "/team", component: Team },
  {
    path: "/jobs", component: Jobs,
    meta: {
      title: window.site.site_name + ' - ' + 'الوظائف',
    }
  },
  { path: "/pricing", component: Pricing },
  { path: "/login", component: Login },
  { path: "/register", component: Register },
  { path: "/error", component: Error },
  { path: "/faq", component: Faq },
  { path: "/blog-1", component: BlogOne },
  { path: "/blog-2", component: BlogTwo },
  { path: "/blog-details", component: BlogThree },
  {
    path: "/contact", component: Contact,
    meta: {
      title: window.site.site_name + ' - ' + 'الإتصال بنا',
    }
  },
  {
    path: "/privacy-policy", component: PrivacyPolicy,
    meta: {
      title: window.site.site_name + ' - ' + 'سياسة الخصوصية',
    }
  },
  {
    path: "/usage-policy", component: UsagePolicy,
    meta: {
      title: window.site.site_name + ' - ' + 'سياسة الإستخدام',
    }
  },
  { path: "/terms-condition", component: TermsCondition },
  {
    path: "/projects", component: Projects,
    meta: {
      title: window.site.site_name + ' - ' + 'مشاريع المقاولات',
    }
  },
  {
    path: "/projects?page=:number", name: 'projectsFilter', component: Projects, props: true,
    meta: {
      title: window.site.site_name + ' - ' + 'مشاريع المقاولات',
    }
  },
  {
    path: "/technique", component: Technique,
    meta: {
      title: window.site.site_name + ' - ' + 'المشاريع التقنية',
    }
  },
  {
    path: "/technique?page=:number", name: 'techniqueFilter', component: Projects, props: true,
    meta: {
      title: window.site.site_name + ' - ' + 'المشاريع التقنية',
    }
  },
  {
    path: "/factory-materials", component: FactoryMaterials,
    meta: {
      title: window.site.site_name + ' - ' + 'مواد و مصانع',
    }
  },
  {
    path: "/factory-materials?page=:number", name: 'factory-materialsFilter', component: FactoryMaterials, props: true,
    meta: {
      title: window.site.site_name + ' - ' + 'مواد و مصانع',
    }
  },
  {
    path: "/raw-materials", component: RawMaterials,
    meta: {
      title: window.site.site_name + ' - ' + 'المواد الخام',
    }
  },
  {
    path: "/raw-materials?page=:number", name: 'raw-materialsFilter', component: RawMaterials, props: true,
    meta: {
      title: window.site.site_name + ' - ' + 'المواد الخام',
    }
  },
  {
    path: "/equipment", component: Equipment,
    meta: {
      title: window.site.site_name + ' - ' + 'المعدات',
    }
  },
  {
    path: "/equipment?page=:number", name: 'equipmentFilter', component: Equipment, props: true,
    meta: {
      title: window.site.site_name + ' - ' + 'المعدات',
    }
  },
  {
    path: "/DealsAuctions?page=:number", name: 'DealsAuctionsFilter', component: DealsAuctions, props: true,
    meta: {
      title: window.site.site_name + ' - ' + 'الصفقات و المزادات',
    }
  },
  {
    path: "/ContractForms", component: ContractForms,
    meta: {
      title: window.site.site_name + ' - ' + 'نماذج العقود',
    }
  },
  {
    path: "/GuideManual", component: GuideManual,
    meta: {
      title: window.site.site_name + ' - ' + 'الدليل الإرشادي',
    }
  },
  { path: "/blog/:type", name: 'blog', component: BlogDetails, props: true, },
  {
    path: "/DealsAuctions", component: DealsAuctions,
    meta: { title: window.site.site_name + ' - ' + 'الصفقات و المزادات', }
  },
  { path: "/profile/:id/details", name: 'profile', component: Profile, props: true, },
  { path: '/project/:projectId/details', name: 'details', component: ProjectDetails, props: true, },
  { path: "/deals-auctions/:id/details", name: 'deals-auctions-details', component: DealsAuctionsDetails, props: true, },
  { path: "/SubmitQuotes/:id", name: 'SubmitQuotes', component: SubmitQuotes, props: true, },
];

const router = createRouter({
  history: createWebHistory(),
  linkExactActiveClass: "active",
  routes,
  scrollBehavior() {
    return { top: 0 };
  },
});

export default router;
